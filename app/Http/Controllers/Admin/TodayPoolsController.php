<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Content;
use App\Models\Admin\Dimension;
use App\Models\Admin\TodayPool;
use Illuminate\Http\Request;

class TodayPoolsController extends Controller
{
    public function index($id = "emotional")
    {
        $title = Dimension::where('dimension', $id)->get(['dimension', 'title']);
        $dimensions = Dimension::withoutTrashed()->orderBy('order')->get(['dimension', 'title']);
        $contents = Content::withoutTrashed()->activeContents(1)->get(['id', 'title']);
        $collection = Dimension::withoutTrashed()
            ->with('getTodayPool.content')
            ->where('dimension', $id)
            ->orderBy('order')
            ->get(['dimension', 'title', 'order'])->toArray();


        return view('admin.pool.today.index', compact('dimensions', 'collection', 'title', 'contents'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
        $title = Dimension::where('dimension', $id)->get(['dimension', 'title']);
        $dimensions = Dimension::withoutTrashed()->orderBy('order')->get(['dimension', 'title']);
        $contents = Content::withoutTrashed()->activeContents(1)->get(['id', 'title']);
        $collection = Dimension::withoutTrashed()
            ->with('getTodayPool.content')
            ->where('dimension', $id)
            ->orderBy('order')
            ->get(['dimension', 'title', 'order'])->toArray();

//        dd($collection);

        return view('admin.pool.today.index', compact('dimensions', 'collection', 'title', 'contents'));
    }

    public function edit(TodayPool $todayPool)
    {
    }

    public function update(Request $request, TodayPool $todayPool)
    {
    }

    public function destroy(TodayPool $todayPool)
    {
    }
}
