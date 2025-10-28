@extends('cms.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Компании</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            @can('create company')
            <div class="row mb-3">
                <div class="col">
                    <a href="{{route('cms.company.create')}}" type="button" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Создать</a>
                </div>
            </div>
            @endcan
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Описание</th>
                                    <th colspan="3">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <td>{{$company->id}}</td>
                                        <td>{{$company->title}}</td>
                                        <td>{{$company->description}}</td>
                                        <td>
                                            @can('view company')
                                            @if($company->id != 1)
                                            <a  href="{{route('cms.company.show', $company->id)}}"><i class="far fa-eye"></i></a>
                                            @endif
                                            @endcan
                                        </td>
                                        <td>
                                            @can('update company')
                                            @if($company->id != 1)
                                            <a  href="{{route('cms.company.edit', $company->id)}}" class="text-success"><i class="fas fa-pen"></i></a>
                                            @endif
                                            @endcan
                                        </td>
                                        <td>
                                            @can('delete company')
                                            @if($company->id != 1)
                                            <form method="post" action="{{route('cms.company.destroy', $company->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-transparent border-0" type="submit"><i class="fas fa-trash text-danger" role="button"></i></button>
                                            </form>
                                            @endif
                                            @endcan
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
