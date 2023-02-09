@extends('layouts.admin')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Пользователи</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
</div>
<div>
{{--    <p class="lead">--}}
{{--        <a href="{{ route('admin.news.create') }}" class="btn btn-lg btn-secondary">Добавить новость</a>--}}
{{--    </p>--}}
</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Статус</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->is_admin }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td><a href="{{ route('admin.users.edit', ['user' => $user->id]) }}">Изм.</a>
                <a href="javascript:;" class="delete" rel="{{ $user->id }}"style="color:indianred">Уд.</a></td>
            </tr>
            @empty
            <tr>
                <td colspan="5">записей нет</td>
            </tr>
            @endforelse
        </tbody>
    </table>
{{--    {{ $users->links() }}--}}
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
                       send(`/admin/users/${id}`).then(() => {
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
