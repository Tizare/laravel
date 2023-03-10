@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Ресурсы</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
</div>
<div>
    <p class="lead">
        <a href="{{ route('admin.sources.create') }}" class="btn btn-lg btn-secondary">Добавить ресурс</a>
    </p>
</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Сайт поставщик</th>
                <th>Ссылка</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sources as $source)
            <tr>
            <td>{{ $source->id }}</td>
            <td>{{ $source->title }}</td>
            <td>{{ $source->url }}</td>
            <td><a href="{{ route('admin.sources.edit', ['source' => $source->id]) }}">Изм.</a>
                <a href="javascript:;" class="delete" rel="{{ $source->id }}"style="color:indianred">Уд.</a></td>
            </tr>
            @empty
            <tr>
                <td colspan="4">записей нет</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $sources->links() }}
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
                       send(`/admin/sources/${id}`).then(() => {
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
