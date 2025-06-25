<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin\{Content, Dimension, DimensionLayouts};

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\{StoreDimensionRequest, UpdateDimensionRequest};

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class DimensionController extends Controller
{

    public function index()
    {
        $segments = request()->segments();
        $dimensionID = (end($segments) == "dimensions" ? 'emotional' : end($segments));

        // Fetch title and dimension details
        $title = Dimension::where('dimension', $dimensionID)->first(['dimension', 'title']);
        $dimensions = Dimension::withoutTrashed()->orderBy('order')->get(['dimension', 'title']);
        $contents = Content::withoutTrashed()->activeContents(1)->get(['id', 'title']);

        // Use eager loading and avoid fetching unnecessary fields
        $categories = Dimension::with(['categories.layouts.contents'])
            ->where('dimension', $dimensionID)
            ->orderBy('order')
            ->get(['dimension', 'title', 'order']);

        // Check if categories are available to avoid errors
        $filteredData = [];
        if ($categories->isNotEmpty()) {
            $filteredData = collect($categories[0]->categories)
                ->mapWithKeys(function ($item) {
                    return [
                        $item->category => [
                            'title' => $item->title,
                            'category' => $item->category,
                            'order' => $item->order,
                        ]
                    ];
                })
                ->toArray();
        }

        $categoryTitles = collect($filteredData)->pluck('title', 'category')->toArray();

        return view('admin.dimensions.index', compact('dimensions', 'categories', 'title', 'contents', 'categoryTitles'));
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
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request):JsonResponse
    {
        $record = new DimensionLayouts();
        $info = [];
        $info['category_id'] = $request->input('category_id');
        $info['dimension_id'] = $request->input('dimension_id');
        $info['content_id'] = $request->input('content_id');
        $info['created_by'] = $info['updated_by'] = Auth::user()->id;

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
     * @return
     */
    public function show($id)
    {
        // Fetch title and dimension details
        $title = Dimension::where('dimension', $id)->first(['dimension', 'title']);
        $dimensions = Dimension::withoutTrashed()->orderBy('order')->get(['dimension', 'title']);
        $contents = Content::withoutTrashed()->activeContents(1)->get(['id', 'title']);

        // Use eager loading and avoid fetching unnecessary fields
        $categories = Dimension::with(['categories.layouts.contents'])
            ->withoutTrashed()
            ->where('dimension', $id)
            ->orderBy('order')
            ->get(['dimension', 'title', 'order']);

        // Check if categories are available to avoid errors
        $filteredData = [];
        if ($categories->isNotEmpty()) {
            $filteredData = collect($categories[0]->categories)
                ->mapWithKeys(function ($item) {
                    return [
                        $item->category => [
                            'title' => $item->title,
                            'category' => $item->category,
                            'order' => $item->order,
                        ]
                    ];
                })
                ->toArray();
        }

        $categoryTitles = collect($filteredData)->pluck('title', 'category')->toArray();

        return view('admin.dimensions.index', compact('dimensions', 'categories', 'title', 'contents', 'categoryTitles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Dimension $dimension
     * @return Response
     */
    public function edit(Dimension $dimension)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDimensionRequest $request
     * @param Dimension $dimension
     * @return Response
     */
    public function update(UpdateDimensionRequest $request, Dimension $dimension)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $record = DimensionLayouts::findOrFail($id);
        $record->deleted_at = now();
        $record->deleted_by = Auth::user()->id;
        $record->save();

        return response()->json([
            "status" => $record,
            "message" => "Başarıyla sildiniz!!",
            "class" => ($record) ? "info" : "danger",
        ]);
    }
}
