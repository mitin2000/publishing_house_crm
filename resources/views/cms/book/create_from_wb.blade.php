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
                                    @if(!$nmID->contains($card['nmID']))
                                        <option value="{{$key}}">{{$card['title']}}</option>
                                    @endif
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
                                    <label>Артикул</label>
                                    <input name="code" type="text" class="form-control" aria-describedby="Артикул"
                                            value="{{old('code')}}">
                                    @error('code')
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
                                    @error('pub_number')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Обложка</label>
                                    <input name="cover" type="text" class="form-control" aria-describedby="Обложка"
                                            value="{{old('cover')}}">
                                    @error('cover')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Вид бумаги</label>
                                    <input name="paper_type" type="text" class="form-control" aria-describedby="Вид бумаги"
                                            value="{{old('paper_type')}}">
                                    @error('paper_type')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            <div class="mb-3">
                                <label>Высота, см</label>
                                <input name="height" type="text" class="form-control" aria-describedby="Высота"
                                       value="{{old('height')}}">
                                @error('height')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Ширина, см</label>
                                <input name="width" type="text" class="form-control" aria-describedby="Ширина"
                                       value="{{old('width')}}">
                                @error('width')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Глубина, см</label>
                                <input name="depth" type="text" class="form-control" aria-describedby="Глубина"
                                       value="{{old('depth')}}">
                                @error('depth')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Вес, г</label>
                                <input name="weight" type="text" class="form-control" aria-describedby="Вес, г"
                                       value="{{old('weight')}}">
                                @error('weight')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Количество страниц</label>
                                <input name="pages" type="text" class="form-control" aria-describedby="Количество страниц"
                                       value="{{old('pages')}}">
                                @error('pages')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Язык</label>
                                <input name="lang" type="text" class="form-control" aria-describedby="Язык"
                                       value="{{old('lang')}}">
                                @error('lang')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Возрастные ограничения</label>
                                <input name="age_limit" type="text" class="form-control" aria-describedby="Возрастные ограниченияк"
                                       value="{{old('age_limit')}}">
                                @error('age_limit')
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
                            <input type="hidden" name="subjectID">
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
                $.ajax({
                    url: "{{route('cms.book.get_wb_info')}}",
                    method: 'get',
                    data: {
                        nmID: cardArr.cards[key].nmID
                    },
                    success: function (response) {
                        console.log(response);
                        $('input[name="title"]').val(response.title);
                        $('#summernote1').summernote('code', response.description);
                        $('#image-wb').html('<img class="image-for-card" src="'+response.img+'" />');
                        $('input[name="image_wb"]').val(response.img);
                        $('#prev_img-wb').html('<img class="image-for-card" src="'+response.preview_img+'" />');
                        $('input[name="prev_img_wb"]').val(response.preview_img);
                        $('input[name="nmID"]').val(response.nmID);
                        $('input[name="imtID"]').val(response.imtID);
                        $('input[name="nmUUID"]').val(response.nmUUID);
                        $('input[name="subjectID"]').val(response.subjectID);
                        if(typeof response.vendorCode !== "undefined") $('input[name="code"]').val(response.vendorCode);
                        if(typeof response.isbn !== "undefined") $('input[name="isbn"]').val(response.isbn);
                        if(typeof response.cover !== "undefined") $('input[name="cover"]').val(response.cover);
                        if(typeof response.year !== "undefined") $('input[name="year"]').val(response.year);
                        if(typeof response.paper_type !== "undefined") $('input[name="paper_type"]').val(response.paper_type);
                        if(typeof response.height !== "undefined") $('input[name="height"]').val(response.height);
                        if(typeof response.width !== "undefined") $('input[name="width"]').val(response.width);
                        if(typeof response.depth !== "undefined") $('input[name="depth"]').val(response.depth);
                        if(typeof response.pages !== "undefined") $('input[name="pages"]').val(response.pages);
                        if(typeof response.lang !== "undefined") $('input[name="lang"]').val(response.lang);
                        if(typeof response.age_limit !== "undefined") $('input[name="age_limit"]').val(response.age_limit);
                        if(typeof response.weight !== "undefined") $('input[name="weight"]').val(response.weight);
                    },
                });
            })

            function search(arr, value) {
                if(!(arr instanceof Array)) return value === arr;
                return arr.some(item => search(item, value));
            }
        })
    </script>
@endsection
