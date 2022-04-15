<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index ()
    {
        $books = Book::all();
        return view('pages.admin.books.index', compact('books'));
    }

    public function show($book) 
    {        
        $current_book = Book::where('id', '=', $book)->first();
        // return view('pages.book-detail', ['book' => $current_book] );
        if (!isset($stars_number)){
            $stars_number = 0;
        }
        return view('pages.book-detail', ['book' => $current_book, 'stars_number' => $stars_number] );
    }

    public function create ()
    {
        return view('pages.admin.books.create');
    }


    public function store (Request $request)
    {
        $validated = $request->validate([
            // 'cover' => ['required', 'min:1'],
            'title' => ['required', 'min:1'],
            'author' => ['required', 'min:1'],
            'year' => ['required', 'min:1'],
            'genre' => ['required', 'min:1'],
            'pages' => ['required', 'min:2'],
            'description' => ['required', 'min:10'],
            'collection' => ['required', 'min:10'],
            'publishing_house' => ['required', 'min:3'],
            'edition' => ['required', 'min:3'],
        ]);
        // $validated['guard_name'] = $request->name; 
        Book::create($validated);
        return redirect()->route('pages.admin.books.index');
    }


    public function edit (Book $book)
    {
        $categories = Category::all();
        return view('pages.admin.books.edit', compact('book', 'categories'));
    }


    public function update (Request $request, Book $book)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $book->update($validated);
        return redirect()->route('pages.admin.books.index');
    }


    public function destroy (Book $book)
    {
        $book->delete();
        return redirect()->back();
    }
    

    public function attachCategory (Request $request, Book $book)
    {
        $current_book = Book::where('id', '=', $book['id'])->first();
        $curent_category = Category::where('name', '=', $request['category'])->first();
        $current_book->categories()->attach($curent_category->id);
        return redirect()->back();
    }


    public function detachCategory (Book $book, Category $category)
    {
        $current_book = Book::where('id', '=', $book['id'])->first();
        $current_book->categories()->detach($category);
        return redirect()->back();
    }

}
