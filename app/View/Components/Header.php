<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Header extends Component
{
   public $user;
   public $profile_name;
   public $profile_image;
   public $id;
   
   /**
    * Create a new component instance.
    *
    * @return void
    */
   public function __construct()
   {
       if (Auth::user()) {
           $this->user = Auth::user();
           $this->profile_name = $this->user->name;
           $this->profile_image = $this->user->image; 
           $this->id = $this->user->id;
       }
       
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
