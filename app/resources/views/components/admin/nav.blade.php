<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" href="{{ route('admin.index') }}">
                  <span data-feather="home"></span>
                  Главная <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif" href="{{ route('admin.news.index') }}">
                  <span data-feather="file"></span>
                  Новости
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.users.*')) active @endif" href="{{ route('admin.users.index') }}" >
                  <span data-feather="users"></span>
                  Пользователи
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.sources.*')) active @endif" href="{{ route('admin.sources.index') }}">
                  <span data-feather="bar-chart-2"></span>
                  Ресурсы
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.questions.*')) active @endif" href="{{ route('admin.questions.index') }}">
                  <span data-feather="layers"></span>
                  Запросы
                </a>
            </li>
        </ul>
    </div>
</nav>
