@extends('cms.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid mb-4">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Создание книги</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="mb-3 form-group">
                        <label>Выберите карточку:</label>
                        <select id="wbcard" name="wbcard" class="select2" data-placeholder="Выберите" style="width: 100%;">
                            <option value="">---</option>
                            @if(!empty($wbCards['cards']))
                                @foreach($wbCards['cards'] as $key => $card)
                                    <option value="{{$key}}">{{$card['title']}}</option>
                                @endforeach
                            @endif

                        </select>
                    </div>
                </div>
            </div>

                <form action="{{route('cms.book.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row p-2">
                        <div class="col-md-6 p-3">
                            <!-- Левая колонка -->
                            <div class="mb-3">
                                <label>Название книги</label>
                                <input name="title" type="text" class="form-control" aria-describedby="Название"
                                       value="{{old('title')}}">
                                @error('title')
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
                                <label>Описание</label>
                                <textarea id="summernote1" class="summernote" name="description">
                            {{old('description')}}
                        </textarea>
                                @error('description')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Изображение для превью</label>
                                <div id="prev_img-wb" class="mb-2"></div>
                                <input name="prev_img_wb" type="text" class="form-control" aria-describedby="Ссылка на изображение"
                                       placeholder="Ссылка на изображение"
                                       value="{{old('prev_img_wb')}}">
                                @error('prev_img_wb')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label>Основное изображение</label>
                                <div id="image-wb" class="mb-2"></div>
                                <input name="image_wb" type="text" class="form-control" aria-describedby="Ссылка на изображение"
                                       placeholder="Ссылка на изображение"
                                       value="{{old('image_wb')}}">
                                @error('image_wb')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>


                        </div>
                        <div class="col-md-6 p-3">
                            <!-- Правая колонка -->
                                <div class="mb-3 form-group">
                                    <label>Выберите категорию</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">---</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                                {{ $category->id == old('category_id') ? 'selected' : '' }}
                                            >{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('series')
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
                            <input type="hidden" name="nmID">
                            <input type="hidden" name="imtID">
                            <input type="hidden" name="nmUUID">
                    </div>
                        <div class="mb-3 mt-5">
                            <button type="submit" class="btn btn-primary">Создать</button>
                            <a class="btn btn-outline-secondary" href="{{route('cms.book.index')}}">Назад</a>
                        </div>
                    </div>
                </form>
        </div>
    </section>

@endsection

@section('javascript')
    <script>

        $(document).ready(function() {
            $('#wbcard').change(function () {
                let key = $(this).val();
                let cardArr = @json($wbCards);
                $('input[name="title"]').val(cardArr.cards[key].title);
//                console.log(cardArr.cards[key].photos[0].big);
                $('#summernote1').summernote('code', cardArr.cards[key].description);
                $('#image-wb').html('<img class="image-for-card" src="'+cardArr.cards[key].photos[0].big+'" />');
                $('input[name="image_wb"]').val(cardArr.cards[key].photos[0].big);
                $('#prev_img-wb').html('<img class="image-for-card" src="'+cardArr.cards[key].photos[0].c246x328+'" />');
                $('input[name="prev_img_wb"]').val(cardArr.cards[key].photos[0].c246x328);
                $('input[name="nmID"]').val(cardArr.cards[key].nmID);
                $('input[name="imtID"]').val(cardArr.cards[key].imtID);
                $('input[name="nmUUID"]').val(cardArr.cards[key].nmUUID);
            })
        })
    </script>
@endsection
