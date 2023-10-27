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
    <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
    @error('title')
    <div class="invalid-feedback">
    {{$message}}
    </div>
    @enderror
    </div>
    </div>

    <div class="form-group mt-2">
    <label for="type">Тип издания:</label>
    <select name="type" id="type" class="form-select @error('type') is-invalid @enderror">
        @foreach(config('type.type') as $type)
        <option value="{{$type}}" @if (old('type') == $type) selected @endif>{{ $type }}</option>
        @endforeach
    </select>
    @error('type')
    <div class="invalid-feedback">
    {{$message}}
    </div>
    @enderror
    </div>

    <div class="form-group mt-2">
    <label for="author_id">Автор:</label>
    <select name="author_id" id="author_id" class="form-select @error('author_id') is-invalid @enderror">
        @foreach ($authors as $author)
            <option value="{{ $author->id }}" @if (old('author_id') == $author->id) selected @endif>{{ $author->name }}</option>
        @endforeach
    </select>
    @error('author_id')
    <div class="invalid-feedback">
    {{$message}}
    </div>
    @enderror
    </div>

    <div class="form-group mt-2">
    <label for="genres">Жанры:</label>

    
    <select name="genres[]" id="genres" class="form-select @error('genres') is-invalid @enderror" multiple>

        @foreach ($genres as $genre)
            <option value="{{ $genre->id }}" @if (old('genres') && in_array($genre->id, old('genres'))) selected @endif>{{ $genre->name }}</option>
        @endforeach
    </select>
    @error('genres')
    <div class="invalid-feedback">
    {{$message}}
    </div>
    @enderror
    </div>

    <div class="form-group mt-2">
    <button type="submit" class="btn btn-success">Добавить</button>
    </div>
    </div>
</form>
@endsection