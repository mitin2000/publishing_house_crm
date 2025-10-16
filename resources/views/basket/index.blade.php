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
                    <div class="col fetured-post blog-post" data-aos="fade-right" id="basket_content">
                        @if($basket->count() == 0)
                            <div class="col text-center">
                                <h4>Ваша корзина пока пуста</h4>
                                <p>Перейдите в раздел "Книги", чтобы начать покупки</p>
                                <a href="{{route('book.index')}}">
                                    <button class="btn btn-primary">Начать покупки</button>
                                </a>
                            </div>
                        @else
                        <div class="card" id="basket_table">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <table id="user_orders_table" class="table table-bordered">
                                            <thead>
                                            <tr class="table-secondary">
                                                <th>Товар</th>
                                                <th>Стоимость (1 шт.)</th>
                                                <th>Кол-во</th>
                                                <th class="table-secondary">Кол-во в уп.</th>
                                                <th>Стоимость (Всего)</th>
                                                <th>Действия</th>
                                            </tr>
                                            <tbody>
                                            @foreach($basket as $item)
                                                <tr book_id="{{$item->book->id}}">
                                                    <td>{{$item->book->title}}</td>
                                                    <td>{{$item->book->price}}</td>
                                                    <td>
                                                        <button type="submit"
                                                                class="m-0 p-0 border-0 bg-transparent basketMinus"
                                                                book_id="{{$item->book->id}}">
                                                            <i class="fas fa-minus-square"></i>
                                                        </button>
                                                        <span class="mx-1 quantity"
                                                              book_id="{{$item->book->id}}">{{$item->quantity}}</span>
                                                        <button type="submit"
                                                                class="m-0 p-0 border-0 bg-transparent basketPlus"
                                                                book_id="{{$item->book->id}}">
                                                            <i class="fas fa-plus-square"></i>
                                                        </button>
                                                    </td>
                                                    <td style="background-color: #f2eee9;">20</td>
                                                    <td>
                                                        <span class="sum"
                                                              book_id="{{$item->book->id}}">{{$item->quantity * $item->book->price}}</span>
                                                    </td>
                                                    <td>
                                                        <button type="submit"
                                                                class="bg-transparent border-0  basketDelete"
                                                                book_id="{{$item->book->id}}">
                                                            <i class="fas fa-trash text-danger"></i>
                                                        </button>
                                                    </td>

                                                </tr>

                                            @endforeach
                                            <tr class="table-borderless">
                                                <td colspan="3"></td>
                                                <td><b>Общая стоимость</b></td>
                                                <td colspan="2" id="basket_sum"><b>{{$basketSum}}</b></td>
                                            </tr>
                                            </tbody>
                                            </thead>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card-->

                        <div  id="create_order_button" class="row pt-4 justify-content-end">
                            <div class="col">
                                <a href="{{route('book_order.create')}}">
                                    <button class="btn btn-primary">Оформить заказ</button>
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

            </section>

        </div>

    </main>

    <script>

        $('.basketMinus').on('click', function (event) {
            event.preventDefault();

            let book_id = $(this).attr('book_id');
            let action = 'minus';

            $.ajax({
                url: "{{route('basket.edit')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    book_id: book_id,
                    action: action,
                },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $('.quantity[book_id="' + book_id + '"]').text(response.quantity);
                    $('.sum[book_id="' + book_id + '"]').text(response.sum);
                    $('#basket_sum').html('<b>'+response.basket_sum+'</b>');
                },
            });
        });

        $('.basketPlus').on('click', function (event) {
            event.preventDefault();

            let book_id = $(this).attr('book_id');
            let action = 'plus';

            $.ajax({
                url: "{{route('basket.edit')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    book_id: book_id,
                    action: action,
                },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $('.quantity[book_id="' + book_id + '"]').text(response.quantity);
                    $('.sum[book_id="' + book_id + '"]').text(response.sum);
                    $('#basket_sum').html('<b>'+response.basket_sum+'</b>');
                },
            });
        });

        $('.basketDelete').on('click', function (event) {
            event.preventDefault();

            let book_id = $(this).attr('book_id');

            $.ajax({
                url: "{{route('basket.delete')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    book_id: book_id,
                },
                dataType: "json",
                success: function (response) {
                    if(response.basket_sum > 0){
                        $('tr[book_id="' + book_id + '"]').remove();
                        $('#basket_sum').html('<b>'+response.basket_sum+'</b>');
                    }else{
                        let basket_content_html = '<div class="col text-center">' +
                            '<h4>Ваша корзина пока пуста</h4>' +
                            '<p>Перейдите в раздел "Книги", чтобы начать покупки</p>' +
                            '<a href="{{route('book.index')}}">' +
                            '<button class="btn btn-primary">Начать покупки</button>' +
                            '</a>' +
                            '</div>';
                        $('#basket_content').html(basket_content_html);
                    }
                },
            });
        });

    </script>

@endsection

