<?php

namespace App\Http\Controllers\Admin\BookCategory;

use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(BookCategory $category)
    {
        return view('admin.bookcategory.edit', compact('category'));
    }
}
