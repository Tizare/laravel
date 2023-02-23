@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать ресурс</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div>
        <form method='post' action="{{ route('admin.sources.update', ['source'=> $source]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Сайт поставщик</label>
                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
                       value="{{ $source->title }}">
            </div>
            @error('title') @enderror
            <div class="form-group">
                <label for="url">Ссылка</label>
                <input type="text" id="url" name="url" class="form-control @error('url') is-invalid @enderror"
                       value="{{ $source->url }}">
            </div>
            @error('url') @enderror
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection

