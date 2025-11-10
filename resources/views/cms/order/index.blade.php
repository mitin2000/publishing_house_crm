@extends('cms.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Заказы</h1>
                </div>

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <div class="row mb-3">
                @can('create order')
                <div class="col">
                    <a href="#" type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Создать</a>
                </div>
                @endcan
            </div>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="link_table" class="table table-bordered table-striped hover">
                                <thead>
                                <tr>
                                    <th>№ Заказа</th>
                                    <th>ИНН покупателя</th>
                                    <th>ФИО покупателя</th>
                                    <th>Email</th>
                                    <th>Телефон</th>
                                    <th>Адрес</th>
                                    <th>Сумма</th>
                                    <th>Статус</th>
                                    <th>Дата создания</th>
                                    <th colspan="3">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->inn}}</td>
                                        <td>{{$order->customer_name}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->phone}}</td>
                                        <td>{{$order->address}}</td>
                                        <td>{{$order->amount}}</td>
                                        <td><span class="badge rounded-pill" style="text-align: center; background-color: {{$order->status->color}}; ">{{$order->status->title}}</span></td>
                                        <td>{{$order->created_at}}</td>
                                        <td>
                                            @can('view order')
                                            <a  href="{{route('cms.order.show', $order->id)}}"><i class="far fa-eye"></i></a>
                                            @endcan
                                        </td>
                                        <td>
                                            @can('update order')
                                            <a  href="{{route('cms.order.edit', $order->id)}}" class="text-success"><i class="fas fa-pen"></i></a>
                                            @endcan
                                        </td>
                                        <td>
                                            @can('delete order')
                                            <form method="post" action="{{route('cms.order.destroy', $order->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-transparent border-0" type="submit"><i class="fas fa-trash text-danger" role="button"></i></button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
@endsection

