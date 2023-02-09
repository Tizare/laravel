@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать пользователя</h1>
        <div class="btn-toolbar mb-2 mb-md-0">


        </div>
    </div>
    <div>
        <form method='post' action="{{ route('admin.accounts.update', ['user'=> $user]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="is_admin">Администратор</label>
                <input type="checkbox" id="is_admin" name="is_admin" class="form-control" @if($user->is_admin) checked @endif>
            </div>
{{--            <div class="form-group">--}}
{{--                <label for="category_id">Категория</label>--}}
{{--                <select id="category_id" name="category_id" class="form-control">--}}
{{--                    <option value="0">--Выбрать--</option>--}}
{{--                    @foreach($categoryList as $category)--}}
{{--                        <option value="{{ $category->id }}" @if((int) old('category_id') === $category->id) selected @endif >{{ $category->title }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="text" id="password" name="password" class="form-control" value="{{ $user->password }}">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
