@extends('/layouts/app')

@section('title_block')
Вход
@endsection

@section('navbar')
@include('inc/navbar')
@endsection

@section('content')
<h1>Вход</h1>

@error('login')
<div class="alert alert-dismissible alert-danger">
    {{ $message }}
</div>
@endif


<form method="POST" action="{{ route('admin.login.process') }}">
    @csrf

    <div class="form-group mt-2">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" class="form-control">
 

    <label for="password">Пароль:</label>
    <input type="password" name="password" id="password" class="form-control">


    <button type="submit" class="btn btn-success mt-2">Войти</button>
    </div>
    
</form>


@endsection