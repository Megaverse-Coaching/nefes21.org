<?php

namespace App\View\Components\front\home;

use Illuminate\View\Component;

class todayShowcase extends Component
{
    public $showcase;
    public $contents;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($contents, $showcase)
    {
        $this->showcase = $showcase;
        $this->contents = $contents;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.home.today-showcase');
    }
}
