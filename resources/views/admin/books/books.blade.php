@extends('/layouts/app')

@section('title_block')
Библиотека
@endsection

@section('navbar')
@include('admin/inc/navbar')
@endsection

@section('content')
<h1>Библиотека</h1>



@error('search')
<div class="alert alert-dismissible alert-danger">
<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    {{ $message }}
</div>
@endif



<form class="d-flex" method="get" action="{{ route('admin.books.search') }}">
    <input class="form-control me-sm-2" type="search" name="search" id="search" placeholder="Поиск">
    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Найти</button>
</form>



@if(session("success"))
<div class="alert alert-dismissible alert-success mt-2">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  {{ session("success") }}
</div>
@endif

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Название</a>
          <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('admin.books.sortAZ') }}"> А-Я </a>
          <a class="dropdown-item" href="{{ route('admin.books.sortZA') }}"> Я-А </a>
            
        </div>
      </th>
      <th>
        
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Автор</a>
          <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('admin.books.index') }}"> Все </a>

            @foreach($authors as $author)
                <a class="dropdown-item" href="{{ route('admin.books.authorFilter', $author->id) }}"> {{ $author->name }} </a>
            @endforeach
            
        </div></th>
      <th scope="col">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Жанр</a>
          <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('admin.books.index') }}"> Все </a>
            @foreach($genres as $genre)
            <a class="dropdown-item" href="{{ route('admin.books.genreFilter', $genre->id) }}">{{ $genre->name }}</a>
            @endforeach
        </div>
      </th>
      <th scope="col">Дата добавления</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>

  <tbody>
  <tr>
    @foreach($data as $el)
    <tr>
      <th scope="row">{{ $el->title }}</th>
      <th >{{ $el->author->name }}</th>
      <th >{{ implode(', ' , $el->genres->pluck('name')->toArray()) }}</th>
      <td>{{ $el->created_at->format('d.m.Y') }}</td>
      <td><a href="{{ route('admin.books.edit', $el->id) }}"><button type="submit" class="btn btn-warning btn-sm">Изменить</button></a></td>
      <td><form action="{{ route('admin.books.destroy', $el->id) }}" method="post">
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