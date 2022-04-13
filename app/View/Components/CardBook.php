<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardBook extends Component
{
    public $book;
    public $cover;
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($book, $cover, $id)
    {
        $this->book = $book;
        $this->cover = $cover;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card-book');
    }
}
