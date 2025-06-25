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
        $mainCards = Deck::withoutTrashed()
            ->orderBy('order')
            ->limit(20) // Büyük veri kümelerinde performansı iyileştirmek için limit ekledik
            ->get(['id', 'showcase', 'color']);

        return view('front.card.index', compact('mainCards'));
    }

    /**
     * Show the list of cards for a specific deck.
     *
     * @param int $id
     * @return View
     */
    public function list($id): View
    {
        $cardDetail = Deck::where('id', $id)
            ->where('isValid', 1)
            ->orderBy('order')
            ->get(['id', 'title', 'tag', 'color', 'showcase', 'front', 'back', 'background']);

        $cards = DeckLayout::withoutTrashed()
            ->where('deck_id', $id)
            ->where('daily', 1)
            ->inRandomOrder()
            ->limit(10)
            ->get(['id', 'content_id', 'title', 'description', 'deck_id', 'card_id']);

        return view('front.card.list', compact('cards', 'cardDetail'));
    }

    /**
     * Show the detail of a specific card layout.
     *
     * @param int $id
     * @return View
     */
    public function detail($id): View
    {
        // İlişkili verileri tek sorguda almak için `with()` kullanıldı
        $cardDetail = DeckLayout::with(['contentDetail.admin.authorInfo', 'deck' => function($query) {
            $query->select('id', 'title', 'tag', 'color', 'background');
        }])->findOrFail($id);

        // `Deck` ilişkisi artık `cardDetail` üzerinden erişilebilir, bu yüzden ayrıca `deckDetail` sorgusu yapmaya gerek yok
        $cards = $cardDetail; // `cards` yerine doğrudan `$cardDetail` kullanılabilir

        return view('front.card.detail', compact('cards', 'cardDetail'));
    }
}
