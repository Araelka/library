@extends('/layouts/app')

@section('title_block')
Изменение жанра
@endsection

@section('navbar')
@include('admin/inc/navbar')
@endsection

@section('content')
<h1>Изменение жанра: {{$genre->name}}</h1>
<form method="POST" action="{{ route('admin.genres.update', $genre->id) }}">
    @csrf

    @method('PUT')

    <div class="form-group mt-2">
    <label for="name">Название жанра:</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $genre->name }}">

    <button type="submit" class="btn btn-success mt-2">Сохранить</button>
    </div>
</form>

@endsection