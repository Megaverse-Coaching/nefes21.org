<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Card;
use App\Models\Admin\Content;
use App\Models\Admin\Deck;

use App\Models\Admin\DeckLayout;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use App\DataTables\{CardsDataTable ,DeckDataTable};
use App\Http\Requests\Admin\{StoreDeckRequest, UpdateDeckRequest};
use App\Http\Traits\UploadImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;


class DeckController extends Controller
{
    use uploadImage;

    /**
     * @param DeckDataTable $dataTable
     * @return mixed
     */
    public function index(DeckDataTable $dataTable): mixed
    {
        return $dataTable->render('admin.decks.index');
    }

    /**
     * @param $id
     * @return View
     */
    public function card($id):View
    {
        $title = Deck::whereId($id)->get(['id', 'title', 'tag', 'color']);
        $decks = Deck::withoutTrashed()->get(['id', 'title']);
        $contents = Content::withoutTrashed()->get(['id', 'title']);
        $collection = DeckLayout::withoutTrashed()
            ->with('content')
            ->where('deck_id', $id)
            ->orderBy('card_id')
            ->get(['id', 'card_id', 'title', 'description', 'daily'])->toArray();
        return view('admin.decks.cards.index', compact('collection', 'decks', 'title', 'contents'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('admin.decks._create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDeckRequest $request
     * @return JsonResponse
     */
    public function store(StoreDeckRequest $request): JsonResponse
    {
        $datas = $request->except('_method', '_token', 'showcase_remove', 'front_remove', 'back_remove', 'background_remove');
        $deck = new Deck();
        $info = $images = array();

        foreach ($request->only(array_keys($request->rules())) as $key => $value) $info[$key] = $value;

        $deck->fill(['created_by' => Auth::user()->id, 'title' => $info['title']])->save();

        $images['showcase'] = $this->createImage(name: "showcase", dir: "storage/uploads/decks/$deck->id/", file: $info['showcase'], resize: ['w' => '1600', 'h' => '700']);
        $images['front'] = $this->createImage(name: "front", dir: "storage/uploads/decks/$deck->id/", file: $info['front'], resize: ['w' => '1000', 'h' => '1600']);
        $images['back'] = $this->createImage(name: "back", dir: "storage/uploads/decks/$deck->id/", file: $info['back'], resize: ['w' => '1000', 'h' => '1600']);
        $images['background'] = $this->createImage(name: "background", dir: "storage/uploads/decks/$deck->id/", file: $info['background'], resize: ['w' => '1000', 'h' => '1800']);

        $info['status'] = (array_key_exists('status', $info)) ? 1 : 0;
        $info['isValid'] = (array_key_exists('isValid', $info)) ? 1 : 0;

        $result = $deck->update($images);

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
     * @return Application|Factory|View
     */
    public function show($id): View|Factory|Application
    {
        $deck = Deck::findOrFail($id);
        return view('admin.decks._edit', compact('deck'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $deck = Deck::findOrFail($id);
        return view('admin.decks._edit', compact('deck'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDeckRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateDeckRequest $request, $id): JsonResponse
    {
        $deck = Deck::findOrFail($id);

        $datas = $request->except('_method', '_token');

        $info = array();
        foreach ($request->only(array_keys($request->rules())) as $key => $value)  $info[$key] = $value;

        $info['isValid'] = (array_key_exists('isValid', $info)) ? 1 : 0;

        if (array_key_exists('status', $info)):
                $info['status'] = 1;
                $info['published_at'] = now();
                $info['published_by'] = Auth::user()->id;
        else:   $info['status'] = 0;
        endif;

        if($request->hasFile(key: 'showcase')  || $info['showcase_remove'] == "1"):   $info['showcase'] =     $this->createImage(name: "showcase",    dir: "storage/uploads/decks/$deck->id/", file: $info["showcase"] ?? null,   resize: ['w' => '1600', 'h' => '700'],  key: "decks", rm: $info['showcase_remove']);endif;
        if($request->hasFile(key: 'front')     || $info['front_remove'] == "1"):      $info['front'] =        $this->createImage(name: "front",       dir: "storage/uploads/decks/$deck->id/", file: $info["front"] ?? null,      resize: ['w' => '1000', 'h' => '1600'], key: "decks", rm: $info['front_remove']);endif;
        if($request->hasFile(key: 'back')      || $info['back_remove'] == "1"):       $info['back'] =         $this->createImage(name: "back",        dir: "storage/uploads/decks/$deck->id/", file: $info["back"] ?? null,       resize: ['w' => '1000', 'h' => '1600'], key: "decks", rm: $info['back_remove']);endif;
        if($request->hasFile(key: 'background')|| $info['background_remove'] == "1"): $info['background'] =   $this->createImage(name: "background",  dir: "storage/uploads/decks/$deck->id/", file: $info["background"] ?? null, resize: ['w' => '1000', 'h' => '1800'], key: "decks", rm: $info['background_remove']);endif;

        $info['updated_by'] = Auth::user()->id;

        $result = $deck->update($info);

        return response()->json([
            "status" => $result,
            "message" => $info['title'] . " bilgilerini güncellediniz!",
            "class" => ($result) ? "info" : "error",
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
        $record = DeckLayout::findOrFail($id);
        $record->deleted_at = now();
        $record->deleted_by = Auth::user()->id;
        $record->save();
        return true;
    }


}
