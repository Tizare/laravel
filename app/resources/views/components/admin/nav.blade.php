<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('about') }}">
                  <span data-feather="home"></span>
                  Главная <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('news') }}">
                  <span data-feather="file"></span>
                  Новости
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Пользователи
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span>
                  Отчёты
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Заглушка
                </a>
            </li>
        </ul>
    </div>
</nav>