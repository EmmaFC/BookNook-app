<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    public function index()
    {
        $books = Book::all();
        if(Auth::user()->hasRole('user')) {
            return view('pages.user.home', ['books' => $books]);
        }

        if(!Auth::user()->hasRole('user')) {
            return view('pages.admin.dashboard', ['books' => $books]);
        }
        return view('welcome');
    }


    public function landingpage ()
    {
        // $random_book = Book::inRandomOrder()->first();
        $random_book = 'https://picsum.photos/1024/1024?nocache='.microtime().'';
        return view('welcome', compact('random_book'));
    }

}
