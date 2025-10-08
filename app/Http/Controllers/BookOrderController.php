<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookOrder;
use App\Models\BookOrderItem;
use Illuminate\Http\Request;

class BookOrderController extends Controller
{
    public function saveorder(Request $request){
        $user_id = auth()->check() ? auth()->user()->id : null;
        $book = Book::where('id', $request['book_id'])->first();
        $orderData['user_id'] = $user_id;
        $orderData['status_id'] = 1;
        $order = BookOrder::Create($orderData);
        $orderItemData['book_order_id'] = $order->id;
        $orderItemData['book_id'] = $request['book_id'];
        $orderItemData['title'] = $book->title;
        $orderItemData['quantity'] = $request['quantity'];
        $orderItemData['price'] = $book->price;
        $orderItem = BookOrderItem::Create($orderItemData);
        return view('book_order.success', compact('order'));
    }

    public function create(Request $request){
        dump('Тут будет форма создания заказа');
    }
}
