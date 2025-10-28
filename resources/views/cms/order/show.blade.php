@extends('cms.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Заказ № {{$order->id}}</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <div class="row">
                <div class="col-6">

                    <div class="alert" style="background-color: {{$order->status->color}} !important; color:{{contrast_color($order->status->color)}}">
                        {{$order->status->title}}
                    </div>

                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>ИНН покупателя</td>
                                    <td>{{$order->inn}}</td>
                                </tr>
                                <tr>
                                    <td>ФИО покупателя</td>
                                    <td>{{$order->customer_name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$order->email}}</td>
                                </tr>
                                <tr>
                                    <td>Телефон</td>
                                    <td>{{$order->phone}}</td>
                                </tr>
                                <tr>
                                    <td>Адрес доставки</td>
                                    <td>{{$order->address}}</td>
                                </tr>
                                <tr>
                                    <td>Дата создания</td>
                                    <td>{{$order->created_at}}</td>
                                </tr>
                                <tr>
                                    <td>Дата обновления</td>
                                    <td>{{$order->updated_at}}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-6">
                    <div class="card">

                        <div class="card-body">
                            <h4>Состав заказа</h4>
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Наименование</th>
                                    <th>Количество</th>
                                    <th>Цена за шт.</th>
                                    <th>Всего</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                        <tr>
                                            <td>{{$item->title}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>{{$item->quantity * $item->price}}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2"></td>
                                        <td>Общая стоимость:</td>
                                        <td><b>{{$order->amount}}</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col">
                    <a class="btn btn-outline-primary mr-2" href="{{route('cms.order.edit', $order->id)}}">Редактировать</a>
                    <a class="btn btn-outline-secondary" href="{{route('cms.order.index')}}">Назад</a>
                </div>


            </div>

        </div><!-- /.container-fluid -->
    </section>
@endsection
