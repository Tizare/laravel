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

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Заголовок</th>
                <th>Описания</th>
                <th>Текст</th>
                <th>Категория</th>
                <th>Автор</th>
                <th>Создана</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($newsList as $news)
            <tr>
            <td>{{ $news->id }}</td>
            <td>{{ $news->title }}</td>
            <td>{{ $news->description }}</td>
            <td>{{ $news->text }}</td>
            <td>{{ $news->categories->map(fn($item) => $item->title)->implode(",") }}</td>
            <td>{{ $news->author }}</td>
            <td>{{ $news->created_at }}</td>
            <td>{{ $news->status }}</td>
            <td><a href="{{ route('admin.news.edit', ['news' => $news->id]) }}">Изм.</a>
                <a href="javascript:;" class="delete" rel="{{ $news->id }}"style="color:indianred">Уд.</a></td>
            </tr>
            @empty
            <tr>
                <td colspan="8">записей нет</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $newsList->links() }}
</div>
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function (){
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function (elem, k){
               elem.addEventListener("click", function () {
                   const id = this.getAttribute('rel');
                   if(confirm(`Подтверждаете удаление записи с ID = ${id}`)){
                       send(`/admin/news/${id}`).then(() => {
                           location.reload();
                       });
                   } else {
                       alert("Удаление отменено");
                   }
               });
            });
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
