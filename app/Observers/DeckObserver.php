<?php

namespace App\Observers;

use App\Models\Admin\Deck;
use Illuminate\Support\Facades\Auth;

class DeckObserver
{

    public bool $afterCommit = true;

    /**
     * Handle the Deck "created" event.
     *
     * @param Deck $deck
     * @return void
     */
    public function created(Deck $deck): void
    {

    }

    /**
     * Handle the Deck "updated" event.
     *
     * @param Deck $deck
     * @return void
     */
    public function updated(Deck $deck)
    {

    }

    /**
     * Handle the Deck "deleted" event.
     *
     * @param Deck $deck
     * @return void
     */
    public function deleted(Deck $deck)
    {
        //
    }

    /**
     * Handle the Deck "restored" event.
     *
     * @param Deck $deck
     * @return void
     */
    public function restored(Deck $deck)
    {
        //
    }

    /**
     * Handle the Deck "force deleted" event.
     *
     * @param Deck $deck
     * @return void
     */
    public function forceDeleted(Deck $deck)
    {
        //
    }
}
