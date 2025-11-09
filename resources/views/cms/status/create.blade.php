@extends('cms.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Создание статуса</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="col-4">
                <form action="{{route('cms.status.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label>Название статуса</label>
                        <input name="title" type="text" class="form-control" aria-describedby="Название">
                        @error('title')
                        <div class="text-danger">Это поле необходимо для заполнения "{{$message}}"</div>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label>Выберите тип</label>
                        <select name="type" class="form-control">
                            <option value="">---</option>
                            @foreach($statusTypes as $statusType)
                                <option value="{{$statusType}}"
                                    {{ $statusType == old('type') ? 'selected' : '' }}
                                >{{$statusType}}</option>
                            @endforeach
                        </select>
                        @error('type')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Цвет</label>
                        <input name="color" type="color" list="colorList" aria-describedby="Цвет" value="#ffffff">
                        @include('includes.colorlist')
                        @error('color')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Описание статуса</label>
                        <textarea name="description" type="text" class="form-control">{{old('description')}}</textarea>
                        @error('description')
                        <div class="text-danger">Это поле необходимо для заполнения "{{$message}}"</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Создать</button>
                    <a class="btn btn-outline-secondary" href="{{route('cms.status.index')}}">Назад</a>
                </form>
            </div>


            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>

@endsection
