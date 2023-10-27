@extends('/layouts/app')

@section('title_block')
Жанры
@endsection

@section('navbar')
@include('admin/inc/navbar')
@endsection

@section('content')
<h1>Жанры</h1>

@if(session("success"))
  <div class="alert alert-dismissible alert-success">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    {{ session("success") }}
  </div>
@endif

<form method="POST" action="{{ route('admin.genres.store') }}">
    @csrf


    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror me-sm-2" placeholder="Введите название жанра" value="{{ old('name') }}">
    @error('name')
    <div class="invalid-feedback">
    {{$message}}
    </div>
    @enderror

    <button type="submit" class="btn btn-success mt-2">Добавить</button>

</form>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Название</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>

  <tbody>
@foreach($genres as $genre)
  <tr>
      <th scope="row">{{ $genre->name }}</th>
      <td><a href="{{ route('admin.genres.edit', $genre->id) }}"><button type="submit" class="btn btn-warning btn-sm">Изменить</button></a></td>
      <td><form action="{{ route('admin.genres.destroy', $genre->id) }}" method="POST">
        @csrf
        @method('DELETE')
      <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
      </form>
      </td>
    </tr>
@endforeach
    </tbody>
</table>
@endsection