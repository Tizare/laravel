@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div>
        <form method='post' action="{{ route('admin.questions.update', ['question'=> $question]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $question->name }}">
            </div>
            <div class="form-group">
                <label for="phone">Номер телефона</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ $question->phone }}">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ $question->email }}">
            </div>
            <div class="form-group">
                <label for="text">Новость</label>
                <textarea id="text" name="text" class="form-control"> {!! $question->text !!} </textarea>
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
