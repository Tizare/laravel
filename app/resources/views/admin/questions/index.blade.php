@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Запросы</h1>
        <div class="btn-toolbar mb-2 mb-md-0">


        </div>
</div>
<div>
    <p class="lead">
        <a href="{{ route('admin.questions.create') }}" class="btn btn-lg btn-secondary">Добавить запрос</a>
    </p>
</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Текст</th>
                <th>Имя</th>
                <th>Телефон</th>
                <th>E-mail</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($questions as $question)
            <tr>
            <td>{{ $question->id }}</td>
            <td>{{ $question->text }}</td>
            <td>{{ $question->name }}</td>
            <td>{{ $question->phone }}</td>
            <td>{{ $question->email }}</td>
            <td><a href="{{ route('admin.questions.edit', ['question' => $question->id]) }}">Изм.</a> <a href="" style="color:indianred">Уд.</a></td>
            </tr>
            @empty
            <tr>
                <td colspan="6">записей нет</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
