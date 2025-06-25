<?php

namespace App\Http\Controllers\Front\Video;

use App\Http\Controllers\Controller;
use App\Models\Admin\Author;
use App\Models\Admin\Content;
use App\Models\Admin\TodayShowcase;
use App\Models\Admin\Track;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Storage;


class PlaylistController extends Controller
{
    public function index($id = 101070){

        try {
            $content = Content::withoutTrashed()
                ->with('admin.authorInfo', 'tracks')
                ->where(['id' => $id, 'status' => 1])->firstOrFail();

            $author = $content->admin->authorInfo;
            $tracks = $content->tracks;
            /*
            $content->tracks->map(fn($item) => [
                "id" => $item->id,
                "order" => $item->order,
                "title" => $item->title,
                "link" => $item->link,
                "soundscape_id" => $item->soundscape_id,
                "isFree" => $item->isFree,
                "duration" => $item->duration,
            ]);
            */

            $related = Content::withoutTrashed()->with('admin.authorInfo')
                ->inRandomOrder()
                ->where('admin_id', $content->admin_id)->limit(10)
                ->get(['id', 'title','admin_id', 'type', 'imgShowcase', 'isFree', 'isNew']);

            return view('front.albums.detail', compact('content', 'author', 'tracks', 'related'));

        }catch (ModelNotFoundException $e){
            $err = "Aradığınız İçerik Bulunamadı!";
            return view('errors.404', compact("err"));
        }


    }

    public function play($tid = 401219){

        $track = Track::findOrFail($tid);
        $info = Author::with('contents.tracks')->where('author_id', 901139)->first();

        $total = 0;
        foreach ($info->contents as $item) $total += $item->tracks->count();


        $videoId = Str::remove('.mp3',$track->link);
        $userInfo = "801000";
        $expire = time() + (5*60*60);
        $tokenGenerate = md5("LetheaSecretToken".$expire.$userInfo.$videoId);
        $videoiframeUrl = env('VIDEO_URL');

        $videoLink = $videoiframeUrl."?videoId=".$videoId."&userInfo=".$userInfo."&token=".$tokenGenerate."&expire=".$expire;

        return Http::dd()->get(url: $videoLink);

        dd($result);

        return view('front.albums.play', ['info' => $info, 'contents' => $info->contents, 'total' => $total, 'videoLink' => $videoLink]);
    }
}
