<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreShowcaseRequest;
use App\Http\Requests\Admin\UpdateShowcaseRequest;
use App\Models\Admin\Showcase;
use Auth;
use Illuminate\Http\Response;

class ShowcaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreShowcaseRequest $request
     * @return Response
     */
    public function store(StoreShowcaseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Showcase $showcase
     * @return Response
     */
    public function show(Showcase $showcase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Showcase $showcase
     * @return Response
     */
    public function edit(Showcase $showcase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateShowcaseRequest $request
     * @param Showcase $showcase
     * @return Response
     */
    public function update(UpdateShowcaseRequest $request, Showcase $showcase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return bool
     */
    public function destroy($id): bool
    {
        $record = Showcase::findOrFail($id);
        $record->deleted_at = now();
        $record->deleted_by = Auth::user()->id;
        $record->save();
        return true;
    }
}
