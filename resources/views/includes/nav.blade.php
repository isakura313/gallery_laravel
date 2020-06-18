<nav class="navbar has-background-black-ter" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item has-text-white is-size-4" href="/">
            Мои альбомы
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
            data-target="navbarGallery">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
    <div class="navbar-menu" id="navbarGallery">
        <div class="navbar-start">
            <a href="{{route('create_album_form')}}" class="navbar-item has-text-danger">Создание нового альбома</a>

            @if (Auth::check())
            <!-- если зарегистрирован, тогда нам нужно показать как выйти -->
            <!-- это можно сделать через форму -->
            <a class="navbar-item has-text-danger" href="{{url('/logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                Выйти </a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @endif
            </ul>
        </div>

        <div class="navbar-end">
            <!-- navbar items -->
            @if (Auth::check())
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-primary">
                        <!-- если пользователь зарегистрирован, тогда -> отобразить его имя -->
                        {{{ Auth::user()->name}}}
                    </a>
                    @else
                    <!-- в другом случае -->
                    <a class="button is-light" href="{{route('register')}}"> <strong> Регистрация </strong> </a>
                    <a class="button is-danger" href="{{route('login')}}">Войти</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>