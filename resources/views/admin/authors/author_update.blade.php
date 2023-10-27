@extends('/layouts/app')

@section('title_block')
Изменение автора
@endsection

@section('navbar')
@include('admin/inc/navbar')
@endsection

@section('content')
<h1>Изменение автора: {{$author->name}}</h1>
<form method="POST" action="{{ route('admin.authors.update', $author->id) }}">
    @csrf

    @method('PUT')

    <div class="form-group mt-2">
    <label for="name">Имя автора:</label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $author->name }}">
    @error('name')
    <div class="invalid-feedback">
    {{$message}}
    </div>
    @enderror

    <button type="submit" class="btn btn-success mt-2">Сохранить</button>
    </div>

</form>

@endsection