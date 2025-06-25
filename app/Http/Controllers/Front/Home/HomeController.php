<?php

namespace App\Http\Controllers\Front\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StoreHomeRequest;
use App\Http\Requests\Front\UpdateHomeRequest;
use App\Models\Admin\Author;
use App\Models\Admin\Content;
use App\Models\Admin\Dimension;
use App\Models\Admin\Program;
use App\Models\Admin\Starter;
use App\Models\Admin\TodayPool;
use App\Models\Admin\TodayShowcase;
use App\Models\Front\Home;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Jorenvh\Share\Share;

class HomeController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $authors = Author::activeAuthors()->orderBy('author_id', 'asc')->get(['author_id', 'label', 'title', 'profilePicUrl', 'status']);
        $mainPrograms = Program::withoutTrashed()->inRandomOrder()->get();
        return view('front.home.index', [
            'authors' => $authors,
            'mainPrograms' => $mainPrograms,
        ]);
    }

    public function pro()
    {
        $showcase = TodayShowcase::withoutTrashed()->with('content.admin.authorInfo')->orderBy('priority', 'asc')->get();
        $todayPool = TodayPool::with('content')->where('dimension_id', 'spiritual')->get(['id', 'section_id', 'content_id']);
        $todayStarters = Starter::with('content.admin.authorInfo')->limit(10)->orderBy('order')->get();

        $suggested = Content::where('id', '101373')->get();
        $mainPrograms = Program::withoutTrashed()->inRandomOrder()->get();
        $authors = Author::orderBy('author_id', 'asc')->limit(6)->get(['author_id', 'label', 'title', 'profilePicUrl']);
        $discover = self::getDimensions();
//        $shareComponent = self::ShareWidget();
        $categories = Dimension::withoutTrashed()
            ->with(['categories.limitedLayouts.contents'])
            ->where('dimension', 'emotional')
            ->orderBy('order')
            ->get(['dimension', 'title', 'order']);


        return view('front.home.pro',  compact('showcase','discover', 'todayPool','mainPrograms','authors','todayStarters','suggested', 'categories'));

    }
    public function category($id){
        $title = Dimension::where('dimension', $id)->get(['dimension', 'title']);
        $dimensions = Dimension::withoutTrashed()->orderBy('order')->get(['dimension', 'title']);
        $contents = Content::withoutTrashed()->get(['id', 'title']);
        $categories = Dimension::withoutTrashed()
            ->with(['categories.layouts.contents'])
            ->where('dimension', $id)
            ->orderBy('order')
            ->get(['dimension', 'title', 'order']);

        $categoryTitles = $categories[0]->categories->mapWithKeys(fn($item) => [
            "title" => $item['title'],
            "category" => $item['category'],
            "order" => $item['order'],
        ])->toArray();

        return view('front.home.detail', compact('dimensions', 'categories', 'title', 'contents', 'categoryTitles'));
    }


    public function getDimensions(){
        return Dimension::withoutTrashed()
            ->select(['dimension', 'title', 'description'])
            ->orderBy('order', 'asc')
            ->get()->map(function ($item, $key) {
            return [
                "title" => $item->title,
                "description" => $item->description,
                "dimension" => $item->dimension,
                "image" => "storage/uploads/discover/dimensions/".$item->dimension.".webp"
            ];
        });
    }

 public function ShareWidget()
    {
        return Share::page(
            'https://www.positronx.io/create-autocomplete-search-in-laravel-with-typeahead-js/',
            'Your share text comes here',
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp();
    }
}
