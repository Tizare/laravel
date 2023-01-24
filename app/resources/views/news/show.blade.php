@extends('layouts.main')
@section('content')
<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic">{{ $news['title'] }}</h1>
        <div class="mb-1 text-muted">{{ $news['author'] }} ({{ $news['created_at'] }})</div>
        <p class="lead my-3">{{ $news['text'] }}</p>
        <p class="lead mb-0"><a href="{{ route('news') }}" class="text-white font-weight-bold">Ко всем новостям</a></p>
    </div>
</div>
@endsection