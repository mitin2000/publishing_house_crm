<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookOrder;
use Illuminate\Http\Request;

class BookOrderController extends Controller
{
    public function index()
    {
        $orders = BookOrder::all();
        return view('admin.book_order.index', compact('orders'));
    }

    public function show(BookOrder $order)
    {
        return view('admin.book_order.show', compact('order'));
    }
}
