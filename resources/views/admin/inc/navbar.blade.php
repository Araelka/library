@section('navbar')
<nav class="navbar navbar-expand-lg bg-light" data-bs-theme="light">
  <div class="container">
    <a class="navbar-brand" href="{{ route('admin.books.index') }}">Библиотека</a>
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarColor03" style="">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('admin.books.create') }}">Добавить книгу
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('admin.authors.index') }}">Авторы
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('admin.genres.index') }}">Жанры
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
      </ul>

        
        @if(auth()->guard('admin')->check())
        <div class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->guard('admin')->user()->name }}</a>
      <div class="dropdown-menu" style="">
        <a class="dropdown-item" href="#">Редактировать</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('admin.logout') }}">Выйти</a>
      </div>
</div>
        <!-- <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <button type="button" class="btn btn-secondary">{{ auth()->guard('admin')->user()->name }}</button>
        <div class="btn-group" role="group">
          <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
          <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <a class="dropdown-item" href="#">Редактировать</a>
            <a class="dropdown-item" href="{{ route('admin.logout') }}">Выйти</a>
          </div>
        </div>
      </div> -->
      @endif



        <!-- <form class="d-flex" method="get" action="{{ route('admin.logout') }}">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Выйти</button>
        </form> -->
        

        <!-- @guest('admin')
        <form class="d-flex" method="get" action="{{ route('admin.login') }}">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Войти</button>
        </form>
        @endguest -->

    </div>
  </div>
</nav>