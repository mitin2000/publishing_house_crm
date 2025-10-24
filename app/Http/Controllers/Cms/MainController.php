<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Lid;
use App\Models\User;


class MainController extends Controller
{
    public function index()
    {
        $data =[];
        $data['usersCount'] = User::all()->count();
        $data['coursesBook'] = Book::all()->count();
        $data['lidsCount'] = Lid::all()->count();

        return view('cms.main.index',compact('data'));
    }
}
