<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\{StoreMoodRequest, UpdateMoodRequest};
use App\Models\Admin\{Content, Mood, MoodLayout};
use Illuminate\Contracts\View\View;

class MoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        /*

        Benchmark::dd([
            'Senaryo 1' => fn () => Content::withoutTrashed()->select(['id', 'title'])->get(),
            'Senaryo 2' => fn () => Content::withoutTrashed()->get(['id', 'title'])
        ]);

        */
        $moods = Mood::all();
        $contents = Content::withoutTrashed()->get(['id', 'title']);
        $result = MoodLayout::with('content')->get();
        return view('admin.moods.index', compact('result', 'moods', 'contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMoodRequest $request
     * @param MoodLayout $mood
     * @return JsonResponse
     */
    public function store(StoreMoodRequest $request, MoodLayout $mood):JsonResponse
    {
        $record = new MoodLayout();
        $info = [];
        $info['created_by'] = $info['updated_by'] = Auth::user()->id;

        foreach ($request->only(array_keys($request->rules())) as $key => $value) $info[$key] = $value;
        $result = $record->fill($info)->save();

        return response()->json([
            "status" => $result,
            "message" => "Yeni bilgileri eklediniz!",
            "class" => ($result) ? "info" : "danger",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id):JsonResponse
    {
        $result = MoodLayout::select('id', 'mood_id', 'content_id')->where('id', $id)->get();

        return response()->json([
            "result" => $result,
            "message" => "Güncelleme tamamlandı!",
            "class" => ($result) ? "info" : "error",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Mood  $mood
     * @return \Illuminate\Http\Response
     */
    public function edit(Mood $mood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMoodRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateMoodRequest $request, $id)
    {
        $record = MoodLayout::findOrFail($id);
        $info = array();
        foreach ($request->only(array_keys($request->rules())) as $key => $value)  $info[$key] = $value;

        $info['updated_by'] = Auth::user()->id;

        $result = $record->update($info);

        return response()->json([
            "status" => $result,
            "message" => "Güncelleme tamamlandı!",
            "class" => ($result) ? "info" : "error",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return bool
     */
    public function destroy($id):bool
    {
        $record = MoodLayout::findOrFail($id);
        $record->deleted_at = now();
        $record->deleted_by = Auth::user()->id;
        $record->save();
        return true;
    }
}
