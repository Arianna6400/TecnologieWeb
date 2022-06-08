<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 80px; color:papayawhip">
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
     <form action="{{route('login')}}" method="GET"> 
        <button class="btn btn-outline-success mr-sm-2" type="submit" style=" background-color: red; border: 0px; color: white; padding-top: -2%;">Login</button>
        </form>
      
      <form action="{{route('register')}}" method="GET"> 
        <button class="btn btn-outline-success mr-sm-2" type="submit" style=" background-color: red; border: 0px; color: white; padding-top: -2%;">Registrati</button>
        </form>
  </div>
</nav>
