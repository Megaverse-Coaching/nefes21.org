<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Content;
use App\Models\Admin\MoodLayout;
use App\Models\Admin\Starter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StarterController extends Controller
{
    public function index()
    {
        $results = Starter::with('content:id,title,isFree,isValid,imgShowcase')->withoutTrashed()->get();
        $contents = Content::withoutTrashed()->activeContents(1)->pluck('title', 'id')->toArray();
        return view('admin.today.starters.index', compact('results', 'contents'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request  $request
     * @return JsonResponse
     */
    public function store(Request $request):JsonResponse
    {
        $record = new Starter();
        $info = [];
        $info['section_id'] = $request->input('section_id');
        $info['content_id'] = $request->input('content_id');
        $info['order'] = $request->input('order');
        $info['created_by'] = $info['updated_by'] = Auth::user()->id;

        $result = $record->fill($info)->save();

        return response()->json([
            "status" => $result,
            "message" => "Yeni bilgileri eklediniz!",
            "class" => ($result) ? "info" : "danger",
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return bool
     */
    public function destroy($id): bool
    {
        $record = Starter::findOrFail($id);
        $record->deleted_at = now();
        $record->deleted_by = Auth::user()->id;
        $record->save();
        return true;
    }
}
