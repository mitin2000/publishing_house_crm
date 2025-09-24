@extends('layouts.main')
@section('content')

    <main>
        <div class="container">
            <div class="d-none d-lg-block"><h2 class="text-center pt-5 pb-2"
                                               style="color: #094ca1">{{$course->title}}</h2></div>
            <div class="d-lg-none pb-2"><h3 class="text-center pt-4" data-aos="fade-up"
                                            style="color: #094ca1">{{$course->title}}</h3></div>

            <p class="pb-lg-3 text-center" style="color: grey">Авторы:

                @foreach($authors as $author)
                    {{ is_array($course->authors->pluck('id')->toArray()) && in_array($author->id, $course->authors->pluck('id')->toArray()) ? $author->name . ',' : ''  }}
                @endforeach

            </p>
            <section>
                <div class="row pb-5">
                    <div class="col-md-6">
                        <div class="d-none d-lg-block"><p class="text-center"><img
                                        src="{{url('storage/' . $course->image) }}" alt="featured image" class="w-75">
                            </p></div>
                        <div class="d-lg-none pb-2"><p class="text-center"><img
                                        src="{{url('storage/' . $course->image) }}" alt="featured image" class="w-100">
                            </p></div>
                    </div>
                    <div class="col-md-6">
                        <div>Описание</div>
                        <div>
                            <p>{!! $course->description !!}</p>
                        </div>
                        <div>Где купить</div>
                        <div><a href="{{route('main.index')}}"><img src="{{asset('assets/images/wb-logo.png')}}" width="75"></a>
                            <a href="{{route('main.index')}}"><img src="{{asset('assets/images/ozon-logo.png')}}" width="95"></a></div>
                    </div>

                </div>
            </section>

        </div>

    </main>

@endsection
