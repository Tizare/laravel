@extends('layouts.main')
@section('content')
<div class="row mb-2">
@forelse($news as $n)
    <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-success">категория {{ $n->categories->map(fn($item) => $item->title)->implode(",") }}</strong>
                <h3 class="mb-0">
                <a class="text-dark" href="{{ route('news.show', ['id' => $n->id]) }}">{{ $n->title }}</a>
                </h3>
                <div class="mb-1 text-muted">{{ $n->author}} ({{$n->created_at }})</div>
                <p class="card-text mb-auto">{!! $n->description !!}</p>
                <a href="{{ route('news.show', ['id' => $n->id]) }}">Подробнее</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" src="{{ Storage::disk('public')->url($n->image) }}">
        </div>
    </div>
@empty
    <div class="empty-news">В мире всё спокойно!</div>
@endforelse
</div>
<div>
    {{ $news->links() }}
</div>
@endsection

