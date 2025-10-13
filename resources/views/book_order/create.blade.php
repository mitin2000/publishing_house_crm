@extends('layouts.main')
@section('content')

    <div class="container mb-5">
        <div class="row mb-3">
            <div class="col">
                <h1 class="text-center">Офомление заказа</h1>
            </div>
        </div>
        <form action="{{route('book_order.store')}}" method="post">
        @csrf
            <div class="row mt mb-2">
                <div class="col-lg-6">
                    <div class="col">
                        <label><span class="text-danger">* </span>Фамилия:</label>
                        <div class="input-group mb-3">
                            <input name="lastname" type="text" class="form-control" value="{{old('lastname')}}">
                        </div>
                        @error('lastname')
                        <div class="text-danger">Это поле необходимо для заполнения "{{$message}}"</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label><span class="text-danger">* </span>Имя:</label>
                        <div class="input-group mb-3">
                            <input name="firstname" type="text" class="form-control" value="{{old('firstname')}}">
                        </div>
                        @error('firstname')
                        <div class="text-danger">Это поле необходимо для заполнения "{{$message}}"</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label>Отчество:</label>
                        <div class="input-group mb-3">
                            <input name="middlename" type="text" class="form-control" value="{{old('middlename')}}">
                            @error('middlename')
                            <div class="text-danger">Это поле необходимо для заполнения "{{$message}}"</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="col">
                        <div class="form-group">
                            <label><span class="text-danger">* </span>Телефон:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input name="phone" type="text" class="form-control"

                                       value="{{old('phone')}}"
                                >
                                <input type="hidden" name="phone_prefix" id="phone_prefix" value="7">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label><span class="text-danger">* </span>Email:</label>
                        <div class="input-group mb-3">

                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input name="email" type="email" class="form-control" placeholder=""
                                   value="{{old('email')}}">
                        </div>
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label><span class="text-danger">* </span>Адрес доставки</label>
                        <div class="input-group mb-3">
                            <input name="address" type="text" class="form-control" value="{{old('address')}}">
                            @error('address')
                            <div class="text-danger">Это поле необходимо для заполнения "{{$message}}"</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Оформить заказ</button>
            <a class="btn btn-outline-secondary" href="{{route('main.index')}}">Назад</a>
        </form>
    </div>

@endsection
