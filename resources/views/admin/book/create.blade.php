@extends('admin.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid mb-4">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Создание книги</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div  class="col-6">
                <form action="{{route('admin.book.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label>Название книги</label>
                        <input name="title" type="text" class="form-control" aria-describedby="Название"
                               value="{{old('title')}}">
                        @error('title')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Описание</label>
                        <textarea class="summernote" name="description">
                            {{old('description')}}
                        </textarea>
                        @error('description')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="exampleInputFile">Изображение для превью</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="prev_img">
                                <label class="custom-file-label">Выберите файл</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                        </div>
                        @error('prev_img')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="exampleInputFile">Основное изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image">
                                <label class="custom-file-label">Выберите файл</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                        </div>
                        @error('image')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label>Выберите автора/ов:</label>
                        <select name="author_ids[]" class="select2" multiple="multiple" data-placeholder="Выберите" style="width: 100%;">
                            @foreach($authors as $author)
                                <option
                                    {{ is_array(old('author_ids')) && in_array($author->id, old('author_ids')) ? ' selected' : ''  }}
                                    value="{{$author->id}}">{{$author->name}}</option>
                            @endforeach
                        </select>
                        @error('author_ids')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>ISBN</label>
                        <input name="isbn" type="text" class="form-control" aria-describedby="ISBN"
                               value="{{old('isbn')}}">
                        @error('isbn')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Год</label>
                        <input name="year" type="text" class="form-control" aria-describedby="Год"
                               value="{{old('year')}}">
                        @error('year')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Издание</label>
                        <input name="pub_number" type="text" class="form-control" aria-describedby="Издание"
                               value="{{old('pub_number')}}">
                        @error('year')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-group">
                        <h5><b>Торговый каталог</b></h5>
                        <label>Стоимость (руб.)</label>
                        <input name="price" type="text" class="form-control" aria-describedby="price"
                               value="{{old('price')}}">
                        @error('price')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>



                    <div class="mb-3 mt-5">
                        <button type="submit" class="btn btn-primary">Создать</button>
                        <a class="btn btn-outline-secondary" href="{{route('admin.course.index')}}">Назад</a>
                    </div>


                </form>
            </div>


            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>









@endsection
