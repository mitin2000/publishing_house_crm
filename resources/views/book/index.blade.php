@extends('layouts.main')
@section('content')

    <main class="blog">
        <div class="container">

            <div class="row p-5">
                <div class="col">
                </div>
            </div>

            <nav>
                <div style="font-family: 'Blogger Sans', serif; color: #0a53be;" class="nav nav-tabs nav-fill"
                     id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#category-home"
                            type="button" role="tab" aria-controls="category-home" aria-selected="true"><h4>Все</h4>
                    </button>
                    @foreach($categories as $category)
                        <button class="nav-link" id="category{{$category->id}}-tab" data-bs-toggle="tab" data-bs-target="#category{{$category->id}}"
                                type="button" role="tab" aria-controls="category-{{$category->id}}" aria-selected="false">
                            <h4>{{$category->title}}</h4>
                        </button>
                    @endforeach
            </nav>
            <div class="pt-5 tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="category-home" role="tabpanel" aria-labelledby="category-home-tab"
                     tabindex="0">
                    <section class="featured-posts-section">
                        <div class="row">
                            @foreach($books as $book)
                                <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <a href="{{route('book.show', $book->id)}}">
                                            <img src="{{'storage/' . $book->prev_img}}" alt="blog post">
                                        </a>
                                    </div>
                                    <p class="blog-post-category">Книга детям</p>
                                    <a href="{{route('book.show', $book->id)}}" class="blog-post-permalink">
                                        <h6 style="font-family: 'Blogger Sans', serif;" class="blog-post-title">«{{$book->title}}»</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>

                @foreach($categories as $category)
                    <div class="tab-pane fade" id="category{{$category->id}}" role="tabpanel" aria-labelledby="category{{$category->id}}-tab"
                         tabindex="0">
                        <section class="featured-posts-section">
                            <div class="row">
                                @if($books->where('category_id', $category->id)->count() > 0)
                                    @foreach($books->where('category_id', $category->id) as $book)
                                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                                            <div class="blog-post-thumbnail-wrapper">
                                                <a href="{{route('book.show', $book->id)}}">
                                                    <img src="{{'storage/' . $book->prev_img}}" alt="blog post">
                                                </a>
                                            </div>
                                            <p class="blog-post-category">Книга детям</p>
                                            <a href="{{route('book.show', $book->id)}}" class="blog-post-permalink">
                                                <h6 style="font-family: 'Blogger Sans', serif;" class="blog-post-title">«{{$book->title}}»</h6>
                                            </a>
                                        </div>
                                    @endforeach
                                @else
                                    Здесь пока ничего нет
                                @endif
                            </div>
                        </section>
                    </div>
                @endforeach



            </div>


        </div>

    </main>

@endsection
