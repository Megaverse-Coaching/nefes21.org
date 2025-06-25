<?php

namespace App\View\Components\front\home;

use Illuminate\View\Component;

class topCharts extends Component
{
    public $charts;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($charts)
    {
        $this->charts = $charts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.home.top-charts');
    }
}
