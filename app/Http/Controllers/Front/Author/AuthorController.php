<?php

namespace App\Http\Controllers\Front\Author;

use App\Http\Controllers\Controller;
use App\Models\Admin\Author;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AuthorController extends Controller
{
    public function index() {
        $authors = Author::orderBy('author_id', 'asc')->limit(6)->get(['author_id', 'label', 'title', 'profilePicUrl']);
        return view('front.author.index', compact('authors'));
    }

    public function detail($id){

        try {
            $author = Author::with('contents.tracks')
                ->where('author_id', $id)
               ->get();
        }catch (ModelNotFoundException $e){
            $err = "Aradığınız Yazar Bulunamadı!";
            return view('errors.404', compact("err"));
        }
        $total = 0;
        foreach ($author[0]->contents as $item) $total += $item->tracks->count();
        return view('front.author.detail', ['info' => $author[0], 'contents' => $author[0]->contents, 'total' => $total]);
    }
}
