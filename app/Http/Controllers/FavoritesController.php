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
      
        if (!$book->users->contains($user->id)) 
        {
            $book->users()->attach( Auth::user()->id, [
                'is_favorite_book' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')]);
                 
        }
        if ($book->users->contains($user->id)) 
        {
            foreach($user->books as $fav_book)
            { 
                if($fav_book->pivot["is_favorite_book"] == 0)
                {
                    $fav_book->pivot["is_favorite_book"] = 1;
                    $fav_book->pivot->save();
                    break;    
                }
                if (is_null($fav_book->pivot->toArray()['reading_starting_date']) 
                        && is_null($fav_book->pivot->toArray()['reading_ending_date'])  
                        && is_null($fav_book->pivot->toArray()['reading_progress']) 
                        && $fav_book->pivot->toArray()['stars_ranking'] == 0)
                {
                    $this_fav_book = Book::where('id', '=', $fav_book->pivot->book_id)->first();
                    $this_fav_book->users()->detach( Auth::user()->id);
                    break; 
                }
                    $fav_book->pivot["is_favorite_book"] = 0;
                    $fav_book->pivot->save();
                    break;
            } 
       }

        return redirect()->back();
    }
}




/* 
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

        if ($user->books()->where('book_id', $book->id)->exists()) {
            foreach($user->books as $fav_book) {
                if ($fav_book->pivot['book_id'] == $book->id && $fav_book->pivot['is_favorite_book'] == 0) { //pivot contiene ese libro y NO es fav
                    // $fav_book->pivot['is_favorite_book'] = 1;

                    $fav_book->pivot->is_favorite_book = 1;
                    $user->books()->sync($fav_book);
                    dd('entiende que está el libro y NO es fav');
                   
            // return redirect()->back();
                }
                
                if ($fav_book->pivot['book_id'] == $book->id && $fav_book->pivot['is_favorite_book'] == 1) { //pivot contiene ese libro y es fav
                    // dd('entiende que está el libro y es fav');
                    if ($user->books()->whereNotNull('.reading_starting_date' && '.reading_ending_date' && '.reading_progress' && '.stars_ranking')) // y no unico registro lleno
                    {
                         dd('entiende que está el libro y es fav yy no unico registro');
                      $fav_book->pivot['is_favorite_book'] = 0;
                      $user->books()->sync($fav_book);
                    }
                    else {
                        // y unico registro lleno
                         dd('entiende que está el libro y es fav y unico registro');
                        // dd($fav_book->pivot['is_favorite_book']);
                        $book->users()->detach(Auth::user()->id);
                            // dd($user->books()->whereNotNull(['.reading_starting_date', '.reading_ending_date', '.reading_progress', '.stars_ranking'])->get());
                    }

                         $tableRelated = $this->belongsToMany('ModelClassName')->getTable();
$this->belongsToMany('ModelClassName')->getQuery()->whereNotNull($tableRelated.'.field')->get(); 


            // return redirect()->back
        }
    }
}
if (!$user->books()->where('book_id', $book->id)->exists()) 
{
    // dd('entiende que NO está el libro');
    
    dd($book->users()->attach(Auth::user()->id, [
        'is_favorite_book' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
        ]));

        $book->users()->attach(Auth::user()->id, [
        'is_favorite_book' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
        ]);
    
    // return redirect()->back();
}
    

    // dd($book);
    // dd($fav_book->pivot['is_favorite_book']);
    
    return redirect()->back();
}



}



if ($current_fav_book->pivot::where(  // es fav y es unico campo completado
            ['is_favorite_book', '=', true],
            ['reading_starting_date', '=', null], 
            ['reading_ending_date', '=', null], 
            ['reading_progress', '=', null], 
            ['stars_ranking', '=', null])) 
        { 

            $fav_book = Book::where('id', '=', $current_fav_book->pivot->book_id)->first();
            $fav_book->users()->detach( Auth::user()->id);
        }
*/














////////////////////////////////////////////////////////////////////////


// IT WORKS

/* 
 public function checkFavorite($id)
    {
        
        $book = Book::where('id', '=', $id)->first();
        $user = Auth::user();

        if (!$book->users->contains($user->id)) {

            $book->users()->attach( Auth::user()->id, [
                'is_favorite_book' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        else {
            $book->users()->detach( Auth::user()->id);
        }

        return redirect()->back();

    }
*/





/* 


setAttribute(string $key, mixed $value)
Set a given attribute on the model.
*/




/* 


  #passthru: array:21 [▼
  0 => "aggregate"
  1 => "average"
  2 => "avg"
  3 => "count"
  4 => "dd"
  5 => "doesntExist"
  6 => "dump"
  7 => "exists"
  8 => "explain"
  9 => "getBindings"
  10 => "getConnection"
  11 => "getGrammar"
  12 => "insert"
  13 => "insertGetId"
  14 => "insertOrIgnore"
  15 => "insertUsing"
  16 => "max"
  17 => "min"
  18 => "raw"
  19 => "sum"
  20 => "toSql"
] */