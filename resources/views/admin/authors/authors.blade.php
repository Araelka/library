@extends('/layouts/app')

@section('title_block')
Авторы
@endsection

@section('navbar')
@include('admin/inc/navbar')
@endsection


@section('content')
<h1>Авторы</h1>

  @if(session("success"))
  <div class="alert alert-dismissible alert-success">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    {{ session("success") }}
  </div>
  @endif

<form method="POST" action="{{ route('admin.authors.store') }}" class="d-flex">
    @csrf
    
    <input type="text" name="name" id="name" class="form-control me-sm-2" placeholder="Введите имя автора" required>

    <button type="submit" class="btn btn-success me-sm-2">Добавить</button>

</form>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Имя</th>
      <th scope="col">Количество книг</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>

  <tbody>
  <tr>
    @foreach($authors as $author)
    <tr>
      <th scope="row">{{ $author->name }}</th>
      <th scope="row">{{ $author->books_count }}</th>
      <td><a href="{{ route('admin.authors.edit', $author->id) }}"><button type="submit" class="btn btn-warning btn-sm">Изменить</button></a></td>
      <td>
      <form action="{{ route('admin.authors.destroy', $author->id) }}" method="post">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
      </form>
      </td>
    </tr>
@endforeach
    </tr>
    </tbody>
</table>

@endsection