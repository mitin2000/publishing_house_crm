<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Book\StoreRequest;
use App\Http\Requests\Admin\Book\UpdateRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookCategory;
use App\Service\WBService;
use Illuminate\Http\Request;
use App\Service\BookService;

class BookController extends Controller
{

    private $service;

    public function __construct(BookService $service, WBService $wbservice)
    {
        $this->middleware('permission:view book', ['only' => ['index']]);
        $this->middleware('permission:create book', ['only' => ['create','store']]);
        $this->middleware('permission:update book', ['only' => ['update','edit']]);
        $this->middleware('permission:delete book', ['only' => ['destroy']]);

        $this->service = $service;
        $this->wbservice = $wbservice;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('cms.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $categories = BookCategory::all();
        return view('cms.book.create', compact('authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('cms.book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('cms.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = BookCategory::all();
        return view('cms.book.edit', compact('book', 'authors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Book $book)
    {
        $data = $request->validated();
        $book = $this->service->update($data, $book);

        return redirect()->route('cms.book.index', compact('book'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('cms.book.index');
    }

    public function createFromWB()
    {
        $authors = Author::all();
        $categories = BookCategory::all();
        $wbCards = $this->wbservice->list();
        $json = json_encode($wbCards);
        dump($this->wbservice->list());
        return view('cms.book.create_from_wb', compact('authors', 'categories', 'wbCards', 'json'));
    }
}
