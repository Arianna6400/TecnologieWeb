<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 80px; color:papayawhip">
  <a class="navbar-brand" href="{{route('locatore')}}">HOME</a>
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
      <li class="nav-item">
        <a class="nav-link" href="{{route('mieofferte')}}">Mie offerte</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('opzionate')}}">Opzionate</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('insertalloggio')}}">Inserisci alloggio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('chatlocatore')}}">Chat</a>
      </li>
   

    </ul>
    <form class="form-inline my-2 my-lg-0" method = "POST" action ="{{route('logout')}}">
    @csrf
      <input class="btn btn-outline-success mr-sm-2" type="submit" value ="Logout" style=" background-color: #32aaee; border: 0px; color: white;">
    </form>

    <form action="{{route('visualizzaprofilolocatore')}}">
     <button class="btn btn-outline-success mr-sm-2" type="submit" style=" background-color: #32aaee; border: 0px; color: white; padding-top: -2%;">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
    </svg>
    </button>
    </form>
  </div>
</nav>  




