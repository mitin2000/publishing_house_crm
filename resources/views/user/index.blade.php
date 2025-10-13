@extends('layouts.main')
@section('content')

    <div class="row pt-5 pb-5">
        <div class="col text-center">
            <h1>Мои заказы</h1>
        </div>
    </div>

    <main class="blog">
        <div class="container">
            <section class="featured-posts-section">
                <div class="row">
                    <div class="col fetured-post blog-post" data-aos="fade-right">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">

                                        <table id="user_orders_table" class="table table-bordered table-striped hover">
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
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card-->
                    </div>
                </div>
            </section>

        </div>

    </main>
@endsection
