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
@endsection