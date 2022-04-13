<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Header extends Component
{
   /* public $user; */
   public $profile_name;
   public $profile_image;
   public $id;
   
   /**
    * Create a new component instance.
    *
    * @return void
    */
   public function __construct(/* $id */)
   {
      /*  $this->user = User::findOrFail($id); */
       $this->profile_name = 'Emma';
       $this->profile_image = 'https://picsum.photos/200/30'; 
       $this->id = 1;
   }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.organisms.header');
    }
}
