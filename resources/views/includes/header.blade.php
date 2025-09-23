<header class="edica-header sticky-top bg-opacity-75" style="background-color: rgba(255, 255, 255, 0.7); backdrop-filter: blur(5px);  box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{route('main.index')}}"><img src="{{asset('assets/images/logo.png')}}"
                                                                        width="150" alt="Альфики"></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="edicaMainNav">

                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : null }} " href="{{route('main.index')}}">Главная</a>
                    </li>
                    <li class="nav-item {{ request()->is('about*') ? 'active' : null }}">
                        <a class="nav-link" href="{{route('about.index')}}">О нас</a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{route('services.index')}}">Услуги</a>--}}
{{--                    </li>--}}
                    <li class="nav-item dropdown
                    @if(request()->is('course*') || request()->is('future*') || request()->is('commerce*') || request()->is('archive*'))
                        active
                    @endif
                    ">
                        <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Книги</a>
                        <div class="dropdown-menu" aria-labelledby="blogDropdown">
                            <a class="dropdown-item" href="{{route('course.index')}}">Серия 1</a>
                            <a class="dropdown-item" href="{{route('future.index')}}">Серия 2</a>
                            <a class="dropdown-item" href="{{route('archive.index')}}">Архив</a>
                        </div>
                    </li>
                </ul>

                @if( isset(auth()->user()->id) )
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}</a>
                            <div class="dropdown-menu" aria-labelledby="blogDropdown">
                               <!-- <a class="dropdown-item btn btn-link" href="#">
                                    Настройки
                                </a> -->
                                <a class="dropdown-item btn btn-link" href="
                            @switch(auth()->user()->role)
                            @case(1) {{route('admin.main.index')}}">Административная панель
                            @break
                            @case(3) {{route('cc.main.index')}}">Административная панель
                            @break
                            @default
                                    {{route('user.index')}}">Личный кабинет
                            @endswitch
                                </a>
                                <a class="dropdown-item" href="#">
                                    <form action="{{route('logout')}}" method="post">
                                        @csrf
                                        <input class="btn btn-link" type="submit" value="Выйти">
                                    </form>
                                </a>
                            </div>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav ml-auto p-3">
                        <li class="nav-item">
                            <a class="button-lid-create" role="button" href="{{route('lid.create')}}">Оставить заявку</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="button-login" href="{{route('login')}}">Войти</a>
                        </li>
                    </ul>
                @endif

            </div>
        </nav>

    </div>
</header>
