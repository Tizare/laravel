@extends('layouts.main')
@section('content')
    <h2 class="col-4 text-center">{{ $news[0]['title'] }}</h2>
    <div class="row mb-2">
        @forelse($news as $n)
            @foreach($n->news as $item)
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <strong class="d-inline-block mb-2 text-success">категория {{ $n->title }}</strong>
                            <h3 class="mb-0">
                                <a class="text-dark" href="{{ route('news.show', ['id' => $item->id]) }}">{{ $item->title }}</a>
                            </h3>
                            <div class="mb-1 text-muted">{{ $item->author}} ({{$item->created_at }})</div>
                            <p class="card-text mb-auto">{!! $item->description !!}</p>
                            <a href="{{ route('news.show', ['id' => $item->id]) }}">Подробнее</a>
                        </div>
                        <img class="card-img-right flex-auto d-none d-md-block" src="{{ Storage::disk('public')->url($item->image) }}">
                    </div>
                </div>
            @endforeach
        @empty
            <div class="empty-news">В мире всё спокойно!</div>
        @endforelse
    </div>
    <div>
        {{ $news->links() }}
    </div>
@endsection



