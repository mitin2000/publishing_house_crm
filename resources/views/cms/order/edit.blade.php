@extends('cms.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <h1>Редактирование заказа № "{{$order->id}}"</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div  class="col-xl-6">
                <form action="{{route('cms.order.update', $order->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3 form-group alert alert-secondary">
                        <label>Статус</label>
                        <select name="status_id" class="form-control">
                            <option value="" {{ !$order->status_id ? 'selected' : '' }}>---</option>
                            @foreach($statuses as $status)
                                <option value="{{$status->id}}"
                                    {{ $status->id == $order->status_id ? 'selected' : '' }}
                                >{{$status->title}}</option>
                            @endforeach
                        </select>
                        @error('status_id')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>ИНН покупателя</label>
                        <input name="inn" type="text" class="form-control" aria-describedby="ИНН покупателя" value="{{$order->inn}}">
                        @error('inn')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>ФИО покупателя</label>
                        <input name="customer_name" type="text" class="form-control" aria-describedby="ФИО покупателя" value="{{$order->customer_name}}">
                        @error('customer_name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control" aria-describedby="Email" value="{{$order->email}}">
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Телефон</label>
                        <input name="phone" type="text" class="form-control" aria-describedby="Телефон" value="{{$order->phone}}">
                        @error('phone')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Адрес доставки</label>
                        <input name="address" type="text" class="form-control" aria-describedby="Адрес доставки" value="{{$order->address}}">
                        @error('address')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

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

                    <input type="hidden" name="comment" id="comment">

                    <button type="submit" id="form-submit" class="btn btn-primary">Сохранить</button>
                    <a class="btn btn-outline-secondary" href="{{route('cms.order.index')}}">Назад</a>
                </form>
            </div>


            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>


    <div class="modal fade" id="comment-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Введите комментарий</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <textarea name="comment-text" class="form-control" style="min-width: 100%"></textarea>
                    </div>
                    <div>
                        <button type="button" id="comment-submit" class="btn btn-primary">Отправить</button>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Закрыть</button>
                    </div>

                </div>
            </div>
        </div>
    </div>





@endsection
