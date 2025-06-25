<?php

namespace App\View\Components\front\albums;

use Illuminate\View\Component;

class trackList extends Component
{
    public $tracks;
    public $author;
    public $content;
    public $loop;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tracks, $content, $author, $loop)
    {
        $this->tracks = $tracks;
        $this->author = $author;
        $this->content = $content;
        $this->loop = $loop;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.albums.trackList');
    }
}
