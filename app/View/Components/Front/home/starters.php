<?php

namespace App\View\Components\front\home;

use Illuminate\View\Component;

class starters extends Component
{
    public $content;
    public $author;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($content, $author)
    {
        $this->content = $content;
        $this->author = $author;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.home.starters');
    }
}
