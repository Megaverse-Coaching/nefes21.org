<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\CategoriesDataTable;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\{StoreCategoryRequest, UpdateCategoryRequest};
use App\Models\Admin\{Dimension, Category};
use Illuminate\Http\{JsonResponse, Response, Request};
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{

    public function index(): View
    {
        $dimensions = Dimension::withoutTrashed()->orderBy('order', 'asc')->get();
        $category = Category::withoutTrashed()->orderBy('order', 'asc')->get();
        return view('admin.categories.index', compact('dimensions', 'category'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @return JsonResponse
     */
    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $category = new Category();
        $info = array();

        foreach ($request->only(array_keys($request->rules())) as $key => $value) $info[$key] = $value;

        $info['category'] = $info['dimension_id'] ."-".rand(100000,999999);
        $info['status'] = $info['status'] ?? 0;
        $info['created_by'] = Auth::user()->id;
        $info['updated_by'] = Auth::user()->id;

        $result = $category->fill($info)->save();
        return response()->json([
            "status" => $result,
            "message" => $info['title'] . " bilgilerini eklediniz!",
            "class" => ($result) ? "info" : "danger",
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $result = Category::select('category', 'title', 'description', 'dimension_id', 'order', 'status')->where('category', $id)->get();
        return response()->json([
            "result" => $result,
            "message" => "Güncelleme tamamlandı!",
            "class" => ($result) ? "info" : "error",
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return View
     */
    public function edit($id): View
    {
        $data = Category::select('category', 'title', 'description', 'dimension_id')->where('category', $id)->get();

        $dimensions = Dimension::withoutTrashed()->orderBy('order', 'asc')->get();

        return view('admin.categories._edit', compact('data', 'dimensions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoryRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateCategoryRequest $request, $id): JsonResponse
    {
        $category = Category::findOrFail($id);
        $info = array();
        foreach ($request->only(array_keys($request->rules())) as $key => $value)  $info[$key] = $value;

        $info['status'] = $info['status'] ?? 0;
        $info['updated_by'] = Auth::user()->id;

        $result = $category->update($info);

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
    public function destroy($category): bool
    {
        $record = Category::findOrFail($category);
        $record->deleted_at = now();
        $record->deleted_by = Auth::user()->id;
        $record->save();
        return true;
    }
}
