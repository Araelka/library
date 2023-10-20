@extends('/layouts/app')

@section('title_block')
Авторы
@endsection

@section('navbar')
@include('admin/inc/navbar')
@endsection

@section('content')
<h1>{{ $book->title }}</h1>
<h5>{{ $book->author->name }}</h5>
{{ implode(', ' , $book->genres->pluck('name')->toArray()) }}
<br>
{{ $book->type }}

<div>
<a href="{{ route('admin.books.edit', $book->id) }}"><button type="submit" class="btn btn-warning">Изменить</button></a>
<form action="{{ route('admin.books.destroy', $book->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Удалить</button>
</form>
</div>


@endsection