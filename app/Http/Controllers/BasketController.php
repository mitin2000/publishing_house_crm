<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    private  $user_id;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user_id = auth()->check() ? auth()->user()->id : null;
            return $next($request);
        });
    }

    public function store(Request $request)
    {
        $data['user_id'] = $this->user_id;
        $data['book_id'] = $request['book_id'];
        $data['quantity'] = $request['quantity'];
        if($basket = Basket::where('user_id', $this->user_id)->where('book_id', $request['book_id'])->first()){
            $data['quantity'] += $basket->quantity;
            $basket->update(['quantity' => $data['quantity']]);
        }else{
            Basket::Create($data);
        }
    }

    public function edit(Request $request)
    {
        $action = $request['action'];
        $book_id = $request['book_id'];
        $basket = Basket::where('user_id', $this->user_id)->where('book_id', $book_id)->first();
        $quantity = $basket->quantity;
        $count = 1;
        switch ($action){
            case 'minus':
                if(($quantity - $count) <= 0){
                    //Удаляем продукт из корзины
                }else{
                    $basket->update(['quantity' => $quantity - $count]);
                }
                break;

            case 'plus':
                $basket->update(['quantity' => $quantity + $count]);
                break;

        }

        $basketAll = Basket::where('user_id', $this->user_id)->get();
        $basketSum = 0;
        foreach($basketAll as $item){
            $basketSum += $item->book->price * $item->quantity;
        }

        $returnData = [
            'book_id' => $book_id,
            'quantity' => $basket->quantity,
            'sum' => $basket->quantity * $basket->book->price,
            'basket_sum' => $basketSum
        ];
        return json_encode($returnData);
    }

    public function delete(Request $request)
    {
        $book_id = $request['book_id'];
        $basket = Basket::where('user_id', $this->user_id)->where('book_id', $book_id)->first();
        $basket->delete();

        $basketAll = Basket::where('user_id', $this->user_id)->get();
        $basketSum = 0;
        foreach($basketAll as $item){
            $basketSum += $item->book->price * $item->quantity;
        }

        return json_encode(['book_id' => $book_id, 'basket_sum' => $basketSum]);
    }

    public function index()
    {
        $basket = Basket::where('user_id', $this->user_id)->get();
        $basketSum = 0;
        foreach($basket as $item){
            $basketSum += $item->book->price * $item->quantity;
        }
        return view('basket.index', compact('basket', 'basketSum'));
    }
}
