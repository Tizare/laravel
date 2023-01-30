@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">


        </div>
</div>
<div>
    <p class="lead">
        <a href="{{ route('admin.news.create') }}" class="btn btn-lg btn-secondary">Добавить новость</a>
    </p>
</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Заголовок</th>
                <th>Описания</th>
                <th>Текст</th>
                <th>Автор</th>
                <th>Создана</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($newsList as $news)
            <tr>
            <td>{{ $news->id }}</td>
            <td>{{ $news->title }}</td>
            <td>{{ $news->description }}</td>
            <td>{{ $news->text }}</td>
            <td>{{ $news->author }}</td>
            <td>{{ $news->created_at }}</td>
            <td>{{ $news->status }}</td>
            <td>=в разработке=</td>
            </tr>
            @empty
            <tr>
                <td colspan="8">записей нет</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection