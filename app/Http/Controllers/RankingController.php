<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RankingController extends Controller
{
    public function checkRanking ($book, $id){
        $current_book = Book::where('id', '=', $book)->first();
        $user = Auth::user();
        $stars_number = $id;

        if (!$current_book->users->contains($user->id)) 
        {
            $current_book->users()->attach( Auth::user()->id, [
                'stars_ranking' => $stars_number,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]);
                $stars_number = $stars_number;
                // dd('no contiene registro, añade registro con x estrellas');
        }

        if ($current_book->users->contains($user->id)) 
        {
            // dd('contiene registro');
            foreach($user->books as $fav_book)
            { 

                if($fav_book->pivot["stars_ranking"] != $stars_number)
                {
                    $fav_book->pivot["stars_ranking"] = $stars_number;
                    $fav_book->pivot->save();
                    $stars_number = $stars_number;
                    // dd('contiene registro, NO es igual a x estrellas, cambia las estrellas');
                    break;    
                }
                
                if ($fav_book->pivot["stars_ranking"] == $stars_number) {
                    $fav_book->pivot["stars_ranking"] = 0;
                    $fav_book->pivot->save();
                    $stars_number = 0;
                    // dd('contiene registro, es igual a x estrellas, quita las estrellas');
                    
                    if (is_null($fav_book->pivot->toArray()['reading_starting_date'])
                            && is_null($fav_book->pivot->toArray()['reading_ending_date'])
                            && is_null($fav_book->pivot->toArray()['reading_progress'])
                            && $fav_book->pivot->toArray()['is_favorite_book'] == 0) {
                        $this_fav_book = Book::where('id', '=', $fav_book->pivot->book_id)->first();
                        $this_fav_book->users()->detach(Auth::user()->id);
                        $stars_number = 0;
                        // dd('si ademas lo demas es null elimina el registro ');
                    }
                    break;
                }
                
            }
            
        }

        
        return view('pages.book-detail', ['book' => $current_book, 'stars_number' => $stars_number] );
    }
}
