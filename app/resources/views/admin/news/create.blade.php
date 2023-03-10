@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
</div>
<div>
    <form method='post' action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="category_id">Категория</label>
            <select id="category_id" name="category_id" class="form-control">
                <option value="0">--Выбрать--</option>
                @foreach($categoryList as $category)
                <option value="{{ $category->id }}" @if((int) old('category_id') === $category->id) selected @endif >{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
        </div>
        @error('title')@enderror
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" id="author" name="author" class="form-control" value="{{ old('author') }}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
        </div>
        @error('description')@enderror
        <div class="form-group">
            <label for="text">Новость</label>
            <textarea id="text" name="text" class="form-control @error('description') is-invalid @enderror" >{{ old('text') }}</textarea>
        </div>
        @error('text')@enderror
        <div class="form-group">
            <label for="status">Статус</label>
            <select id="status" name="status" class="form-control ">
                @foreach($statusList as $status)
                <option @if(old('status') === $status) selected @endif value="{{ $status }}">{{ $status }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <input type="file" id="image" name="image" class="form-control" >
        </div>
        <br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>
@endsection
@push('js')
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('text', options);
    </script>
@endpush
