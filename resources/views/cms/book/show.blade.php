@extends('cms.layouts.main')
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
                                    <td>Обложка</td>
                                    <td>
                                        <img src="{{ url('storage/' . $book->prev_img) }}" alt="img" width="85">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Название</td>
                                    <td>{{$book->title}}</td>
                                </tr>
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
                                    <td>{{ $book->category->title  }}</td>
                                </tr>
                                <tr>
                                    <td>Артикул</td>
                                    <td>{{$book->code}}</td>
                                </tr>
                                <tr>
                                    <td>ISBN</td>
                                    <td>{{$book->isbn}}</td>
                                </tr>
                                <tr>
                                    <td>Год</td>
                                    <td>{{$book->year}}</td>
                                </tr>
                                <tr>
                                    <td>Номер издания</td>
                                    <td>{{$book->pub_number}}</td>
                                </tr>
                                <tr>
                                    <td>Обложка</td>
                                    <td>{{$book->cover}}</td>
                                </tr>
                                <tr>
                                    <td>Вид бумаги</td>
                                    <td>{{$book->paper_type}}</td>
                                </tr>
                                <tr>
                                    <td>Высота, см</td>
                                    <td>{{$book->height}}</td>
                                </tr>
                                <tr>
                                    <td>Ширина, см</td>
                                    <td>{{$book->width}}</td>
                                </tr>
                                <tr>
                                    <td>Глубина, см</td>
                                    <td>{{$book->depth}}</td>
                                </tr>
                                <tr>
                                    <td>Вес, г</td>
                                    <td>{{$book->weight}}</td>
                                </tr>
                                <tr>
                                    <td>Количество страниц</td>
                                    <td>{{$book->pages}}</td>
                                </tr>
                                <tr>
                                    <td>Язык</td>
                                    <td>{{$book->lang}}</td>
                                </tr>
                                <tr>
                                    <td>Возрастные ограничения</td>
                                    <td>{{$book->age_limit}}</td>
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
                    @can('update book')
                    <a class="btn btn-outline-primary mr-2" href="{{route('cms.book.edit', $book->id)}}">Редактировать</a>
                    @endcan
                    <a class="btn btn-outline-secondary" href="{{route('cms.book.index')}}">Назад</a>
                </div>


            </div>

        </div><!-- /.container-fluid -->
    </section>

@endsection
