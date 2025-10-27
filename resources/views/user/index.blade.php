@extends('layouts.main')
@section('content')

    <div class="row pt-5 pb-5">
        <div class="col text-center">
            <h1>Мои заказы</h1>
        </div>
    </div>

    <main>
        <div class="container">
            <div class="row pb-5">
                <div class="col">

                    <table id="link_table" class="table table-bordered table-striped hover">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Состав заказа</th>
                            <th>Сумма</th>
                            <th>Статус</th>
                        </tr>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>
                                    @foreach($order->items as $item)
                                        {{$item->title}}<br>
                                    @endforeach
                                </td>
                                <td>{{$order->amount}}</td>
                                <td>Обработка</td>
                            </tr>
                        @endforeach
                        </tbody>
                        </thead>
                    </table>

                </div>
            </div>


        </div>

    </main>
@endsection
