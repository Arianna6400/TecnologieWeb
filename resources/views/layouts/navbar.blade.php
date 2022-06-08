<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('home')}}">HOME</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="{{route('who')}}" >Chi siamo </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('cosaOffriamo')}}">Cosa offriamo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('where')}}">Dove siamo</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('FAQ')}}">FAQ</a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <a class="btn btn-outline-success mr-sm-2" type="submit" href="{{route('login')}}">Login</a>
      <a class="btn btn-outline-success my-2 my-sm-0" type="submit" href="{{route('register')}}">Registrati</a>
    </form>
  </div>
</nav>
