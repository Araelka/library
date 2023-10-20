@extends('/layouts/app')

@section('title_block')
Библиотека
@endsection

@section('navbar')
@include('inc/navbar')
@endsection

@section('content')
<h1>Вход</h1>

<div  id="error-message"></div>



<form id="loginForm" method="POST" action="{{  route('login.process') }}">
    @csrf

    <div class="form-group mt-2">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" class="form-control" required>

    <label for="password">Пароль:</label>
    <input type="password" name="password" id="password" class="form-control" required>

    <button type="submit" class="btn btn-success mt-2">Войти</button>
    </div>
    
</form>
<a href="{{ route('register') }}"><button type="submit" class="btn btn-secondary mt-2">Зарегестрироваться</button></a>




@endsection