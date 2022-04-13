<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    public function checkFavorite($id)
    {
        
        $book = Book::where('id', '=', $id)->first();
        $user = Auth::user();

        if (!$book->users->contains($user->id)) {

            $book->users()->attach( Auth::user()->id, [
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        else {
            $book->users()->detach( Auth::user()->id);
        }

        return redirect()->back();

    }
}
