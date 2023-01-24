<a href="{{ route('category') }}">Выбрать категорию новостей</a>
<a href="{{ route('news') }}">Ко всем новостям</a>

@if ($news['0']['category_id'] == 1)
        <h2>Новости культуры</h2>
    @elseif ($news['0']['category_id'] == 2)
        <h2>Новости кино</h2>
    @elseif ($news['0']['category_id'] == 3)
        <h2>Новости спорта</h2>
    @elseif ($news['0']['category_id'] == 4)
        <h2>Игровые новости</h2>
    @elseif ($news['0']['category_id'] == 5)
        <h2>Ещё какие-то новости</h2>
@endif

@foreach($news as $n)
    <div class="news"> 
        <h2>{{ $n['title'] }}</h2>
        <!-- категория отражена для проверки, что новости сортируются правильно -->
        <sup>категория {{ $n['category_id'] }}</sup>
        <p>{{ $n['description'] }}</p>
        <div><strong>{{ $n['author'] }} ({{ $n['created_at'] }})</strong></div>
        <a href='{{ route('news.show', ['id' => $n['id']]) }}'>Подробнее</a>
    </div>
@endforeach



