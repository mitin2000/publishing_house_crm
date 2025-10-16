@extends('layouts.main')
@section('content')

    <main>
        <div class="container">
            <div class="d-none d-lg-block"><h2 class="text-center pt-5 pb-2"
                                               style="color: #094ca1">{{$book->title}}</h2></div>
            <div class="d-lg-none pb-2"><h3 class="text-center pt-4" data-aos="fade-up"
                                            style="color: #094ca1">{{$book->title}}</h3></div>

            <p class="pb-lg-3 text-center" style="color: grey">Авторы:


                    {{ implode(', ', $authors)  }}


            </p>
            <section>
                <div class="row pb-5">
                    <div class="col-md-6">
                        <div class="d-none d-lg-block"><p class="text-center"><img
                                        src="{{url('storage/' . $book->image) }}" alt="featured image" class="w-75">
                            </p></div>
                        <div class="d-lg-none pb-2"><p class="text-center"><img
                                        src="{{url('storage/' . $book->image) }}" alt="featured image" class="w-100">
                            </p></div>
                    </div>
                    <div class="col-md-6">
                        @if(isset(auth()->user()->id))
                            <div id="add_to_basket" class="col pb-3">
                            @if($is_basket === true)
                                    <a href="{{route('basket.index')}}">
                                        <button class="btn btn-outline-success">
                                            <i class="nav-icon fas fa-shopping-cart"></i> Товар в корзине
                                        </button>
                                    </a>
                            @else
                                <form id="basketForm">
                                    <input type="hidden" id="book_id" name="book_id" value="{{$book->id}}">
                                    <input type="hidden" id="quantity" name="quantity" value="1">
                                    <button type="submit" class="btn btn-outline-success"> <i class="nav-icon fas fa-cart-plus"></i> Добавить в заказ</button>
                                </form>
                            @endif
                        </div>
                        @endif
                        <div>Описание</div>
                        <div>
                            <p>{!! $book->description !!}</p>
                        </div>
                        <div>Где купить</div>
                        <div><a href="{{route('main.index')}}"><img src="{{asset('assets/images/wb-logo.png')}}" width="75"></a>
                            <a href="{{route('main.index')}}"><img src="{{asset('assets/images/ozon-logo.png')}}" width="95"></a></div>
                    </div>

                </div>
            </section>

        </div>

    </main>

    <script>

        $('#basketForm').on('submit',function(event){
            event.preventDefault();

            let book_id = $('#book_id').val();
            let quantity = $('#quantity').val();

            $.ajax({
                url: "{{route('basket.store')}}",
                type:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    book_id:book_id,
                    quantity:quantity,
                },
                success:function(response){
                    $('#add_to_basket').html('<a href="{{route('basket.index')}}"><button class="btn btn-outline-success"><i class="nav-icon fas fa-shopping-cart"></i> Товар в корзине</button></a>');
                },
            });
        });
    </script>

@endsection
