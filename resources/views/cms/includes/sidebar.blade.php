<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('main.index')}}" class="brand-link">
        <img src="{{asset('dist/img/logo_cat_wh.png')}}" alt="Logo" width="55">
        <span class="brand-text font-weight-light">Publishing House</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('cms.main.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Дашборд
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('cms.user.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Пользователи
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.company.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            Компании
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('cms.book.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>
                            Книги
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('cms.author.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Авторы
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('cms.bookcategory.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Категории продуктов
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('cms.status.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-exclamation-circle"></i>
                        <p>
                            Статусы
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('cms.order.index')}}" class="nav-link">
                        <i class="nav-icon far fa-usd"></i>
                        <p>
                            Заказы
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
