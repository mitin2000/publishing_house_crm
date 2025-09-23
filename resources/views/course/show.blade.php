@extends('layouts.main')
@section('content')

    <main class="blog-post">
        <div class="container">
            <div class="d-none d-lg-block"><h2 class="text-center pt-5 pb-2 " data-aos="fade-up"
                                               style="color: #094ca1">{{$course->title}}</h2></div>
            <div class="d-lg-none pb-2"><h3 class="text-center pt-4" data-aos="fade-up"
                                            style="color: #094ca1">{{$course->title}}</h3></div>

            <p class="pb-lg-3 text-center" style="color: grey" data-aos="fade-up" data-aos-delay="200">Авторы:

                @foreach($authors as $author)
                    {{ is_array($course->authors->pluck('id')->toArray()) && in_array($author->id, $course->authors->pluck('id')->toArray()) ? $author->name . ',' : ''  }}
                @endforeach

            </p>
            <section class="blog-post-featured-img mb-1" data-aos="fade-up" data-aos-delay="300">
                <div class="row">
                    <div class="col">
                        <div class="d-none d-lg-block"><p class="text-center"><img
                                        src="{{url('storage/' . $course->image) }}" alt="featured image" class="w-75">
                            </p></div>
                        <div class="d-lg-none pb-2"><p class="text-center"><img
                                        src="{{url('storage/' . $course->image) }}" alt="featured image" class="w-100">
                            </p></div>
                    </div>
                </div>

            </section>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">

                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        <p>{!! $course->description !!}</p>
                    </div>
                </div>

            </section>

            <div class="row">
                <div class="col-lg-9 mx-auto">

                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up"></h2>

                    </section>
                </div>
            </div>
        </div>

    </main>

@endsection
