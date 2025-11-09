<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Book;
use App\Models\BookOrder;
use App\Models\BookOrderItem;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Requests\Common\BookOrder\StoreRequest;


class BookOrderController extends Controller
{
    public function create(Request $request){
        return view('book_order.create');
    }

    public function store(StoreRequest $request){
        $status = Status::where('type', 'order')->where('title', 'Новый заказ')->get();
        $data = $request->validated();
        $user_id = auth()->check() ? auth()->user()->id : null;
        $basket = Basket::where('user_id', $user_id)->get();
        $orderData['user_id'] = $user_id;
        $orderData['status_id'] = $status->id;
        $orderData['inn'] = $data['inn'];
        $orderData['customer_name'] = $data['lastname'] . ' ' . $data['firstname'] . ' ' . $data['middlename'];
        $orderData['phone'] = $data['phone'];
        $orderData['email'] = $data['email'];
        $orderData['address'] = $data['address'];
        $orderData['amount'] = 0;

        $order = BookOrder::Create($orderData);

        foreach($basket as $item){
            $book = Book::where('id', $item['book_id'])->first();
            $orderItemData['book_order_id'] = $order->id;
            $orderItemData['book_id'] = $item['book_id'];
            $orderItemData['title'] = $book->title;
            $orderItemData['quantity'] = $item['quantity'];
            $orderItemData['price'] = $book->price;
            BookOrderItem::Create($orderItemData);
            $orderData['amount'] += $book->price * $item['quantity'];
        }

        $order->update(['amount' => $orderData['amount']]);
        Basket::where('user_id', $user_id)->delete();

        return view('book_order.success', compact('order'));
    }


}
