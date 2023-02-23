<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        <a class="p-2 text-muted" href="{{ route('news') }}">Все новости</a>
        <a class="p-2 text-muted" href="{{ route('category.show', ['id' => 1]) }}">Кино</a>
        <a class="p-2 text-muted" href="{{ route('category.show', ['id' => 2]) }}">Технологии</a>
        <a class="p-2 text-muted" href="{{ route('category.show', ['id' => 3]) }}">Спорт</a>
        <a class="p-2 text-muted" href="{{ route('category.show', ['id' => 4]) }}">Игры</a>
        <a class="p-2 text-muted" href="{{ route('category.show', ['id' => 5]) }}">Интересное</a>
        <a class="p-2 text-muted" href="{{ route('category.show', ['id' => 6]) }}">Больше новостей</a>
    </nav>
</div>
