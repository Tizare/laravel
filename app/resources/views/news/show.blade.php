@extends('layouts.main')
@section('content')

    @foreach($news as $newss)
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <img src="{{ Storage::disk('public')->url($newss->image) }}" width="300">
            <h1 class="display-4 font-italic">{!! $newss->title !!}</h1>
            <div class="mb-1 text-muted">{{ $newss->author }} ({{ $newss->created_at }})</div>
            <p class="lead my-3">{!! $newss->text !!}</p>
            <p class="lead mb-0"><a href="{{ route('news') }}" class="text-white font-weight-bold">Ко всем новостям</a></p>
        </div>
    </div>
    @endforeach
@endsection
