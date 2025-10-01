<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Course;
use App\Models\Lid;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data =[];
        $data['usersCount'] = User::all()->count();
        $data['coursesBook'] = Book::all()->count();
        $data['lidsCount'] = Lid::all()->count();

        return view('admin.main.index',compact('data'));
    }
}
