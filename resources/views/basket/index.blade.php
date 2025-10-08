@extends('layouts.main')
@section('content')

    <div class="row pt-5 pb-5">
        <div class="col text-center">
            <h1>Моя корзина</h1>
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
                                                <th>Товар</th>
                                                <th>Стоимость (1 шт.)</th>
                                                <th>Кол-во</th>
                                                <th>Стоимость (Всего)</th>
                                            </tr>
                                            <tbody>
                                            @foreach($basket as $item)
                                                <tr>
                                                    <td>{{$item->book->title}}</td>
                                                    <td>{{$item->book->price}}</td>
                                                    <td>
                                                        <button type="submit" class="m-0 p-0 border-0 bg-transparent basketMinus" book_id="{{$item->book->id}}">
                                                            <i class="fas fa-minus-square"></i>
                                                        </button>
                                                        <span class="mx-1 quantity" book_id="{{$item->book->id}}">{{$item->quantity}}</span>
                                                        <button type="submit" class="m-0 p-0 border-0 bg-transparent basketPlus" book_id="{{$item->book->id}}">
                                                            <i class="fas fa-plus-square"></i>
                                                        </button>
                                                    </td>
                                                    <td>
                                                        <span class="sum" book_id="{{$item->book->id}}">{{$item->quantity * $item->book->price}}</span>
                                                    </td>

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
                        <div class="row">
                            <div class="col">
                                <a href="{{route('book_order.create')}}">
                                    <button class="btn btn-primary">Оформить заказ</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

    </main>

    <script>

        $('.basketMinus').on('click',function(event){
            event.preventDefault();

            let book_id = $(this).attr('book_id');
            let action = 'minus';

            $.ajax({
                url: "{{route('basket.edit')}}",
                type:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    book_id:book_id,
                    action:action,
                },
                dataType: "json",
                success:function(response){
                    console.log(response);
                    $('.quantity[book_id="'+book_id+'"]').text(response.quantity);
                    $('.sum[book_id="'+book_id+'"]').text(response.sum);
                },
            });
        });

        $('.basketPlus').on('click',function(event){
            event.preventDefault();

            let book_id = $(this).attr('book_id');
            let action = 'plus';

            $.ajax({
                url: "{{route('basket.edit')}}",
                type:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    book_id:book_id,
                    action:action,
                },
                dataType: "json",
                success:function(response){
                    console.log(response);
                    $('.quantity[book_id="'+book_id+'"]').text(response.quantity);
                    $('.sum[book_id="'+book_id+'"]').text(response.sum);
                },
            });
        });
    </script>

@endsection

