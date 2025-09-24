<?php

namespace App\Http\Controllers\Social;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Document;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {

        return view('social.index');
    }
}
