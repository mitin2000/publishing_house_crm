@extends('cms.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Книги</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            @can('create book')
            <div class="row mb-3">
                <div class="col">
                    <a href="{{route('cms.book.create')}}" type="button" class="btn btn-primary"><i
                            class="fa fa-plus-circle"></i> Создать</a>
                </div>
            </div>
            @endcan
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="col pt-2">
                                <table id="link_table" class="table table-bordered table-striped hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Обложка</th>
                                        <th>Название</th>
                                        <th>Дата создания</th>
                                        <th>Статус</th>
                                        <th>Тираж</th>
                                        <th>Поступления (руб.)</th>

                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($books as $book)
                                        <tr>
                                            <td>{{$book->id}}</td>
                                            <td><img src="{{ url('storage/' . $book->prev_img) }}" alt="img" width="85">
                                            </td>
                                            <td>{{$book->title}}</td>
                                            <td>{{$book->created_at}}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            <td>
                                                <a href="{{route('cms.book.show', $book->id)}}"><i
                                                        class="far fa-eye"></i></a>
                                                @can('update book')
                                                <a href="{{route('cms.book.edit', $book->id)}}"
                                                   class="text-success"><i class="fas fa-pen"></i></a>
                                                @endcan

                                                @can('delete book')
                                                <form method="post" action="{{route('cms.book.destroy', $book->id)}}"
                                                      class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="bg-transparent border-0" type="submit"><i
                                                            class="fas fa-trash text-danger" role="button"></i></button>
                                                </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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





