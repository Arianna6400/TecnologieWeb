<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 80px; color:papayawhip">
  <a class="navbar-brand" href="{{route('locatario')}}">
   <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
  <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
</svg>
  </a>
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
        <a class="nav-link" href="{{route('opzionataLocatario')}}">Mia opzione</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('chatlocatario')}}">Chat</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{asset('images/tecweb.pdf')}}"> Documentazione </a>
      </li>
   

    </ul>
    <form class="form-inline my-2 my-lg-0" method = "POST" action ="{{route('logout')}}">
    @csrf
      <input class="btn btn-outline-success mr-sm-2" type="submit" value ="Logout" style=" background-color: orange; border: 0px; color: white;">
    </form>

    <form action="{{route('visualizzaprofilolocatario')}}">
    <button class="btn btn-outline-success mr-sm-2" type="submit" style=" background-color: orange; border: 0px; color: white; padding-top: -2%;">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
    </svg>
    </button>
    </form>
  </div>
</nav>  




