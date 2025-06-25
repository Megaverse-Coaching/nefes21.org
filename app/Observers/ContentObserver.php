<?php

namespace App\Observers;

use App\Models\Admin\Admin;
use App\Models\Admin\Content;
use Illuminate\Support\Facades\Auth;

class ContentObserver
{
    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public $afterCommit = true;


    /**
     * Handle the Content "created" event.
     *
     * @param Content $content
     * @return void
     */
    public function created(Content $content)
    {
        //$content->created_by = Auth::user()->id;
    }

    /**
     * Handle the Content "updated" event.
     *
     * @param Content $content
     * @return void
     */
    public function updated(Content $content)
    {
        //$content->updated_by = Auth::user()->id;
        //$content->save();
    }

    /**
     * Handle the Content "deleted" event.
     *
     * @param Content $content
     * @return void
     */
    public function deleted(Content $content)
    {
        $content->deleted_by = Auth::user()->id;
        $content->save();
    }

    /**
     * Handle the Content "restored" event.
     *
     * @param Content $content
     * @return void
     */
    public function restored(Content $content)
    {
        //
    }

    /**
     * Handle the Content "force deleted" event.
     *
     * @param Content $content
     * @return void
     */
    public function forceDeleted(Content $content)
    {
        //
    }
}
