<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $categories = BookCategory::all();
        return view('book.index', compact('books', 'categories'));
    }

    public function show(Book $book)
    {
        $authors = $book->authors->pluck('name')->toArray();
        return view('book.show', compact('book', 'authors'));
    }
}
