@section('navbar')
<nav class="navbar navbar-expand-lg bg-light" data-bs-theme="light">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">Библиотека</a>
    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarColor03" style="">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('books.index') }}">Получить книги с автором
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('authors.index') }}">Получить авторов с количеством книг
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('genres.index') }}">Получить жанры с книгами
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('admin.login') }}">Админ панель
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
      </ul>
      <a class="nav-link active" href="{{ route('login') }}">Войти
            <span class="visually-hidden">(current)</span>
          </a>
        
    </div>
  </div>
</nav>