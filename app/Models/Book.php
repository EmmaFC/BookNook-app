<?php

namespace App\Models;

use App\Models\Star;
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
        return $this->belongsToMany(User::class, 'book_user')->withPivot('is_favorite_book', 'stars_ranking', 'reading_starting_date', 'reading_ending_date','reading_progress');
    }

}