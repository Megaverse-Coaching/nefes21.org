<?php

namespace App\Http\Controllers\Front\Cards;

use App\Http\Controllers\Controller;

use App\Models\Admin\Author;
use App\Models\Admin\Card;
use App\Models\Admin\Deck;
use App\Models\Admin\DeckLayout;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $mainCards = $this->getMainCards();
        return view('front.card.index', compact(var_name: 'mainCards'));
    }

    public function list($id){
        $cardDetail = Deck::where('id', $id)
            ->where('isValid', 1)
            ->orderBy('order')
            ->get(['id', 'title', 'tag', 'color', 'showcase', 'front', 'back', 'background'])
            ->toArray();
        $cards = DeckLayout::withoutTrashed()
            ->where('deck_id', $id)
            ->where('daily', 1)
            ->inRandomOrder()
            ->limit(10)
            ->get(['id', 'content_id', 'title', 'description', 'deck_id', 'card_id'])
            ->toArray();
//        dd($cardDetail);
        return view('front.card.list', compact('cards', 'cardDetail'));
    }


    public function detail($id){
        $cards = DeckLayout::findOrFail($id);
        $deckDetail = Deck::where('id', $cards->deck_id)->get(['title', 'tag', 'color', 'background']);
        $cardDetail = DeckLayout::with('contentDetail.admin.authorInfo')->where('id', $id)->get();
        $content = $cards->contentDetail;
        $mainCards = $this->getMainCards();
        return view('front.card.detail', compact(['cards', 'cardDetail', 'deckDetail', 'content', 'mainCards']));
    }

    private function getMainCards()
    {
        return Deck::withoutTrashed()
            ->inRandomOrder()
            ->orderBy('order')
            ->get(['id', 'showcase', 'color'])
            ->toArray();
    }
}
