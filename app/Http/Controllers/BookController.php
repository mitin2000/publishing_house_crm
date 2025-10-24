<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::where('is_published', 1)->get()->sortBy('order');
        $categories = BookCategory::all();
        return view('book.index', compact('books', 'categories'));
    }

    public function show(Book $book)
    {
        $authors = $book->authors->pluck('name')->toArray();

        //Определяем, есть ли книга в корзине
        $user_id = auth()->check() ? auth()->user()->id : null;
        $is_basket = false;
        if(auth()->check()){
            $is_basket = Basket::where('user_id', auth()->user()->id)->where('book_id', $book->id)->count() > 0 ? true : false;
        }

        return view('book.show', compact('book', 'authors', 'is_basket'));
    }
}
