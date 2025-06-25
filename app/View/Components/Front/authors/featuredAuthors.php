<?php

namespace App\View\Components\front\authors;

use Illuminate\View\Component;

class featuredAuthors extends Component
{
    public $featured;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($featured)
    {
        $this->featured = $featured;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.authors.featured-authors');
    }
}
