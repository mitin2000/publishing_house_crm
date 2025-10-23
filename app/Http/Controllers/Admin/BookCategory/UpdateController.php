<?php

namespace App\Http\Controllers\Admin\BookCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\BookCategory\UpdateRequest;
use App\Models\BookCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, BookCategory $category)
    {
        $data = $request->validated();
        $category->update($data);

        return redirect()->route('admin.bookcategory.show', compact('category'));

    }
}
