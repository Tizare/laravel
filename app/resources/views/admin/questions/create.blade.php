@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить отзыв</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
</div>
<div>
    <form method='post' action="{{ route('admin.questions.store') }}">
        @csrf
        <div class="form-group">
            <label for="user-name">Имя</label>
            <input type="text" id="user-name" name="user-name" class="form-control" value="{{ old('user-name') }}">
        </div>
        <div class="form-group">
            <label for="description">Отзыв</label>
            <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>
<br>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Отправить запрос</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
</div>
<div>
    <form method='post' action="{{ route('admin.questions.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Имя заказчика</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
        </div>
        @error('name') @enderror
        <div class="form-group">
            <label for="phone">Номер телефона</label>
            <input type="tel" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
        </div>
        @error('phone') @enderror
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
        </div>
        @error('email') @enderror
        <div class="form-group">
            <label for="text">Запрос</label>
            <textarea id="text" name="text" class="form-control @error('text') is-invalid @enderror">{{ old('text') }}</textarea>
        </div>
        @error('text') @enderror
        <br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>
@endsection
