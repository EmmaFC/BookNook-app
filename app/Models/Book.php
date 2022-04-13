<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    
    protected $fillable = [

        'title',
        'author',
        'year',
        'genre',
        'cover',
        'pages',
        'description',
        'collection',
        'publishing_house',
        'edition',
        
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category');
    }

    public function users ()
    {
        return $this->belongsToMany(User::class);
    }

    public function usersRanked()
    {
        return $this->belongsToMany(User::class)->withPivot(["ranking"]);
    } 

}
