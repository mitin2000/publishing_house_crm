<header class="edica-header sticky-top bg-opacity-75" style="background-color: rgba(255, 255, 255, 0.7); backdrop-filter: blur(5px);  box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{route('main.index')}}"><img src="{{asset('assets/images/logo_cat.png')}}"
                                                                        width="75" alt="Логотип"> </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="edicaMainNav">

                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : null }} " href="{{route('main.index')}}"><h4 style="font-family: 'Blogger Sans', serif; color: #9a5096;">Главная</h4> </a>
                    </li>
                    <li class="nav-item {{ request()->is('about*') ? 'active' : null }}">
                        <a class="nav-link" href="{{route('about.index')}}"><h4 style="font-family: 'Blogger Sans', serif; color: #fe5000;">О нас</h4></a>
                    </li>
                    <li class="nav-item {{ request()->is('book*') ? 'active' : null }}">
                        <a class="nav-link" href="{{route('book.index')}}"><h4 style="font-family: 'Blogger Sans', serif; color: #97d700;">Книги</h4></a>
                    </li>
                    <li class="nav-item {{ request()->is('social*') ? 'active' : null }}">
                        <a class="nav-link" href="{{route('social.index')}}"><h4 style="font-family: 'Blogger Sans', serif; color: #ffb81c;">Мы в соцсетях</h4></a>
                    </li>

                </ul>

                @if( isset(auth()->user()->id) )
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="blogDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}</a>
                            <div class="dropdown-menu" aria-labelledby="blogDropdown">
                                @if(auth()->user()->hasRole(['super-admin', 'admin', 'manager']))
                                    <a class="dropdown-item btn btn-link" href="{{route('cms.main.index')}}">
                                        Новая административная панель
                                    </a>
                                    @else
                                    <a class="dropdown-item btn btn-link" href="{{route('user.index')}}">
                                        Личный кабинет
                                    </a>
                                @endif
                                <a class="dropdown-item" href="#">
                                    <form action="{{route('logout')}}" method="post">
                                        @csrf
                                        <input class="btn btn-link" type="submit" value="Выйти">
                                    </form>
                                </a>
                            </div>
                        </li>
                        @auth
                            @role('user')
                            <li class="nav-item">
                                <a style=" font-size: 20px;" href="{{route('basket.index')}}"><i class="fa fa-shopping-cart"></i></a>
                            </li>
                            @endrole
                        @endauth
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
