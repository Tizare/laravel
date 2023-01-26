@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">


        </div>
</div>
<div>
    <form method='post' action="{{ route('admin.news.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" id="author" name="author" class="form-control" value="{{ old('author') }}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>
@endsection