@extends('cms.layouts.main')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование пользователя: "{{$user->name}}"</h1>
                </div>

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div  class="col-4">
                <form action="{{route('cms.user.update', $user->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                    </div>
                    <div class="mb-3">
                        <label>Фамилия</label>
                        <input name="lastname" type="text" class="form-control" aria-describedby="Фамилия" value="{{$user->lastname}}">
                        @error('lastname')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Имя</label>
                        <input name="name" type="text" class="form-control" aria-describedby="Имя" value="{{$user->name}}">
                        @error('name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Отчество</label>
                        <input name="middlename" type="text" class="form-control" aria-describedby="Отчество" value="{{$user->middlename}}">
                        @error('middlename')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control" value="{{$user->email}}">
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Пароль</label>
                        <input name="password" type="password" class="form-control">
                        @error('password')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label>Роль пользователя</label>
                        <select name="roles[]" class="form-control" multiple>
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                                <option
                                    value="{{ $role }}"
                                    {{ in_array($role, $userRoles) ? 'selected':'' }}
                                >
                                    {{ $role }}
                                </option>
                            @endforeach
                        </select>
                        @error('roles') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>




                    <button type="submit" class="btn btn-primary">Обновить</button>
                    <a class="btn btn-outline-secondary" href="{{route('cms.user.index')}}">Назад</a>
                </form>
            </div>


            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>

@endsection

@section('javascript')
    <script>
        $('#role').on('change', function (e){
            if($('#role option:selected').val() == 2){
                $('#agent-form').show();
            }else{
                $('#agent-form').hide();
            }

            if($('#role option:selected').val() == 3){
                $('#company-form').show();
            }else{
                $('#company-form').hide();
            }
        })
    </script>
@endsection
