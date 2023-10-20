@extends('/layouts/app')

@section('title_block')
Библиотека
@endsection

@section('navbar')
@include('inc/navbar')
@endsection

@section('content')
<h1>Библиотека</h1>

@if(isset($books))
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">
      <a class="nav-link">Название</a>
      </th>
      <th scope="col">Дата добавления</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>

  <tbody>
  <tr>
    @foreach($books as $el)
    @foreach($el->books as $book)
    <tr>
      <th scope="row">{{ $book->title }}</th>
      <td>{{ $book->created_at->format('d.m.Y') }}</td>
      <td><a href="{{ route('book.update', $book->id) }}"><button type="submit" class="btn btn-warning btn-sm">Изменить</button></a></td>
      <td><a href="{{ route('book.destroy', $book->id) }}"><button type="submit" class="btn btn-danger btn-sm">Удалить</button></a></td>
    </tr>
@endforeach
@endforeach
    </tr>
    </tbody>
</table>
@endif


@endsection