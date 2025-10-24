@extends('admin.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$book->title}}</h1>
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
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{$book->id}}</td>
                                </tr>
                                <tr>
                                    <td>Название</td>
                                    <td>{{$book->title}}</td>
                                </tr>
{{--                                <tr>--}}
{{--                                    <td>Категория</td>--}}
{{--                                    <td>--}}
{{--                                        @foreach($categories as $category)--}}
{{--                                            {{ $category->id == $course->category_id ? $category->title : '' }}--}}
{{--                                        @endforeach--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
                                <tr>
                                    <td>Авторы</td>
                                    <td>
                                        @foreach($book->authors as $author)
                                            {{ $author->name . '  ' }}
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Категория</td>
                                    <td>
                                   {{$book->category->title}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>ISBN</td>
                                    <td>{{$book->isbn}}</td>
                                </tr>
                                <tr>
                                    <td>Год выпуска</td>
                                    <td>{{$book->year}}</td>
                                </tr>
                                <tr>
                                    <td>Номер издания</td>
                                    <td>{{$book->pub_number}}</td>
                                </tr>
                                <tr>
                                    <td>Цена</td>
                                    <td>{{$book->price}}</td>
                                </tr>
                                <tr>
                                    <td>Дата создания</td>
                                    <td>{{$book->created_at}}</td>
                                </tr>
                                <tr>
                                    <td>Дата обновления</td>
                                    <td>{{$book->updated_at}}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col">
                    <a class="btn btn-outline-primary mr-2" href="{{route('admin.book.edit', $book->id)}}">Редактировать</a>
                    <a class="btn btn-outline-secondary" href="{{route('admin.book.index')}}">Назад</a>
                </div>


            </div>

        </div><!-- /.container-fluid -->
    </section>

@endsection
