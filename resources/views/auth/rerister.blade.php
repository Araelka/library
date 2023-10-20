@extends('/layouts/app')

@section('title_block')
Библиотека
@endsection

@section('navbar')
@include('inc/navbar')
@endsection

@section('content')
<h1>Регистрация</h1>

@error('email')
<div class="alert alert-dismissible alert-danger">
    {{ $message }}
</div>
@endif

<form method="POST" action="{{ route('register.process') }}">
    @csrf

    <div class="form-group mt-2">
    <label for="email">Имя:</label>
    <input type="name" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
    @error('name')
    <div class="invalid-feedback">
    {{$message}}
    </div>
    @enderror

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
    @error('email')
    <div class="invalid-feedback">
    {{$message}}
    </div>
    @enderror

    <label for="password">Пароль:</label>
    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
    @error('password')
    <div class="invalid-feedback">
    {{$message}}
    </div>
    @enderror

    <label for="password">Подтвреждение пароля:</label>
    <input type="password" name="password_confirmation" id="password" class="form-control @error('password') is-invalid @enderror" required>
    @error('password')
    <div class="invalid-feedback">
    {{$message}}
    </div>
    @enderror

    <button type="submit" class="btn btn-success mt-2">Зарегестрироваться</button>
    </div>
    
  
</form>


@endsection