<?php

namespace App\Http\Controllers\Admin\BookCategory;

use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(BookCategory $category)
    {
        return view('admin.bookcategory.show', compact('category'));
    }
}
