@extends('/layouts/app')

@section('title_block')
Добавить книгу
@endsection

@section('navbar')
@include('admin/inc/navbar')
@endsection

@section('content')
<h1>Добавить книгу</h1>

<form method="POST" action="{{ route('admin.books.store') }}">
    @csrf

    <div class="form-group mt-2">
    <label for="title">Название книги:</label>
    <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" required>
    @error('title')
    <div class="invalid-feedback">
    {{$message}}
    </div>
    @enderror
    </div>
    </div>

    <div class="form-group mt-2">
    <label for="type">Тип издания:</label>
    <select name="type" id="type" class="form-select">
        <option value="Графическое издание">Графическое издание</option>
        <option value="Цифровое издание">Цифровое издание</option>
        <option value="Печатное издание">Печатное издание</option>
    </select>
    </div>

    <div class="form-group mt-2">
    <label for="author_id">Автор:</label>
    <select name="author_id" id="author_id" class="form-select">
        @foreach ($authors as $author)
            <option value="{{ $author->id }}">{{ $author->name }}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group mt-2">
    <label for="genres">Жанры:</label>
    <select name="genres[]" id="genres" class="form-select" multiple required>
        @foreach ($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group mt-2">
    <button type="submit" class="btn btn-success">Добавить</button>
    </div>
    </div>
</form>
@endsection