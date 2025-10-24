@extends('admin.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Статусы</h1>
                </div>

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <div class="row mb-3">
                <div class="col">
                    <a href="{{route('admin.status.create')}}" type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Создать</a>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Цвет</th>
                                    <th>Описание</th>
                                    <th>Дата создания</th>
                                    <th colspan="3">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($statuses as $status)
                                    <tr>
                                        <td>{{$status->id}}</td>
                                        <td>{{$status->title}}</td>
                                        <td>
                                            <div class="status-color" style="width: 20px; height: 20px; background-color: {{$status->color}};"></div>
                                        </td>
                                        <td>{{$status->description}}</td>
                                        <td>{{$status->created_at}}</td>
                                        <td><a  href="{{route('admin.status.show', $status->id)}}"><i class="far fa-eye"></i></a></td>
                                        <td><a  href="{{route('admin.status.edit', $status->id)}}" class="text-success"><i class="fas fa-pen"></i></a></td>
                                        <td>
                                            <form method="post" action="{{route('admin.status.delete', $status->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-transparent border-0" type="submit"><i class="fas fa-trash text-danger" role="button"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
