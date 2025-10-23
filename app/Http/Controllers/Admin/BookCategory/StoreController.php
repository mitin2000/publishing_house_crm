<?php

namespace App\Http\Controllers\Admin\BookCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookCategory\StoreRequest;
use App\Models\BookCategory;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        BookCategory::firstOrCreate($data);

        return redirect()->route('admin.bookcategory.index');

    }
}
