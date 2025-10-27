<?php

namespace App\Http\Controllers\Admin\BookCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(BookCategory $category)
    {
        $category->delete();
        return redirect()->route('admin.bookcategory.index');

    }
}
