<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BookOrder;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function __invoke()    {

        $orders = BookOrder::where('user_id', auth()->user()->id)->get();
//        dd($orders);

        return view('user.index', compact('orders'));
    }
}
