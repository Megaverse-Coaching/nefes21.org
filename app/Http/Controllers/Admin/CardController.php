<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CardsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCardRequest;
use App\Http\Requests\Admin\UpdateCardRequest;
use App\Models\Admin\Card;
use App\Models\Admin\Content;
use App\Models\Admin\DeckLayout;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    /**
     * @param CardsDataTable $dataTable
     * @param $id
     * @return mixed
     */
    public function index(CardsDataTable $dataTable, $id): mixed
    {
        $contents = Content::withoutTrashed()->get();
        return $dataTable->with(['id' => $id, 'contents' => $contents])->render('admin.decks.cards.index');
    }

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $card = new DeckLayout();
        $info = array();

        foreach ($request->only(array_values($card->getFillable())) as $key => $value) $info[$key] = $value;

        $info['daily'] = $info['daily'] ?? 0;
        $info['created_by'] = $info['updated_by'] = Auth::user()->id;

        $result = $card->fill($info)->save();
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
        $card = Card::findOrFail($id);
        return view('admin.decks.cards._edit', compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $deck_id
     * @param $card_id
     * @return Application|Factory|View
     */
    public function edit($deck_id, $card_id): View|Factory|Application
    {
        $card = Card::findOrFail($card_id);
        return view('admin.decks.cards._edit', compact('card', 'deck_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCardRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateCardRequest $request, $id): JsonResponse
    {
        $card = Card::findOrFail($id);
        $info = array();
        foreach ($request->only(array_keys($request->rules())) as $key => $value)  $info[$key] = $value;

        $info['status'] = $info['status'] ?? 0;
        $info['updated_by'] = Auth::user()->id;

        $result = $card->update($info);

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
    public function destroy($id): bool
    {
        $record = Card::findOrFail($id);
        $record->deleted_at = now();
        $record->deleted_by = Auth::user()->id;
        $record->save();
        return true;
    }
}
