<?php

namespace App\View\Components\Front\home;

use Illuminate\View\Component;

class discoverCategories extends Component
{
    public $discover;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($discover)
    {
        $this->discover = $discover;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.home.discover-categories');
    }
}
