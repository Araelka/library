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

      @endif


    </div>
  </div>
</nav>