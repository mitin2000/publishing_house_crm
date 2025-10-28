<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookCategory\StoreRequest;
use App\Http\Requests\Admin\BookCategory\UpdateRequest;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view book', ['only' => ['index']]);
        $this->middleware('permission:create book', ['only' => ['create','store']]);
        $this->middleware('permission:update book', ['only' => ['update','edit']]);
        $this->middleware('permission:delete book', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = BookCategory::all();
        return view('cms.bookcategory.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.bookcategory.create');
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
        BookCategory::firstOrCreate($data);

        return redirect()->route('cms.bookcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BookCategory $bookcategory)
    {
        return view('cms.bookcategory.show', compact('bookcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BookCategory $bookcategory)
    {
        return view('cms.bookcategory.edit', compact('bookcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, BookCategory $bookcategory)
    {
        $data = $request->validated();
        $bookcategory->update($data);

        return redirect()->route('cms.bookcategory.show', compact('bookcategory'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookCategory $bookcategory)
    {
        $bookcategory->delete();
        return redirect()->route('cms.bookcategory.index');
    }
}
