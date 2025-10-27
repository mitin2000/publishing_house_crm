<?php

namespace App\Http\Controllers\Admin\BookCategory;

use App\Http\Controllers\Controller;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = BookCategory::all();
        return view('admin.bookcategory.index', compact('categories'));
    }
}
