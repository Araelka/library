@extends('/layouts/app')

@section('title_block')
Авторы
@endsection


@section('navbar')
@include('admin/inc/navbar')
@endsection

@section('content')

<h1>Изменение книги: {{ $book->title }}</h1>


<form method="POST" action="{{ route('admin.books.update', $book->id) }}">
    @csrf

    @method('PUT')

    <div class="form-group mt-2">
    <label for="title">Название книги:</label>
    <input type="text" name="title" id="title" value="{{ $book->title }}" class="form-control @error('title') is-invalid @enderror" required>
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
        <option value="Графическое издание" @if ($book->type == "Графическое издание") selected @endif>Графическое издание</option>
        <option value="Цифровое издание" @if ($book->type == "Цифровое издание") selected @endif>Цифровое издание</option>
        <option value="Печатное издание" @if ($book->type == 'Печатное издание') selected @endif>Печатное издание</option>
    </select>
    </div>

    <div class="form-group mt-2">
    <label for="author_id">Автор:</label>
    <select name="author_id" id="author_id" class="form-select">
        @foreach ($authors as $author)
            <option value="{{ $author->id }}" @if ($author->id == $book->author->id) selected @endif>{{ $author->name }}</option>
        @endforeach
    </select>
    </div>


    <div class="form-group mt-2">
    <label for="genres">Жанры:</label>
    <select name="genres[]" id="genres" class="form-select" multiple required>
        @foreach ($genres as $genre)
            <option value="{{ $genre->id }}" @if (in_array($genre->id, $book->genres->pluck('id')->toArray())) selected @endif>{{ $genre->name }}</option>
        @endforeach
    </select>
    </div>

    <div class="form-group mt-2">
    <button type="submit" class="btn btn-success">Сохранить</button>
    </div>
    </div>
</form>
@endsection