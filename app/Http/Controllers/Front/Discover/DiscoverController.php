<?php

namespace App\Http\Controllers\Front\Discover;

use App\Http\Controllers\Controller;
use App\Models\Admin\{Author, Content, Dimension, Category};
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class DiscoverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $list = Dimension::withoutTrashed()
            ->select(['dimension', 'title', 'description'])
            ->orderBy('order', 'asc')
            ->get();

        $allGenres = new Collection(['Course', 'Audio Book', 'Single', 'Podcast', 'Story', 'Meditation', 'Breath', 'ASMR', 'Music']);

        $genres = $allGenres->map(fn($item, $key) => [
            "title" => $item,
            "image" => "storage/uploads/discover/genres/$item.webp"
        ]);


        $categories = $list->map(function ($item, $key) {
            return [
                "title" => $item->title,
                "description" => $item->description,
                "dimension" => $item->dimension,
                "image" => "storage/uploads/discover/dimensions/".$item->dimension.".webp"
            ];
        })->toArray();


        return view('front.discover.index', compact( 'categories', 'genres'));
    }


    public function detail($id){

        $title = Dimension::where('dimension', $id)->get(['dimension', 'title']);

        $categories = Dimension::withoutTrashed()->with(['categories.layouts.contents'])
            ->where('dimension', $id)->orderBy('order')->get(['dimension', 'title', 'order', 'description']);

        $total = 0;
        foreach ($categories[0]->categories as $category) $total += $category->layouts->count();

        return view('front.discover.detail', compact('categories', 'title', 'total'));
    }
}
