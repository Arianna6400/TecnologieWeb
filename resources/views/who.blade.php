@extends('layouts.public')

@section('title', 'Chi Siamo')

@section('content')
<div class="introwho">
</div>
<div class="intro2who">
  <div class="titolowho">
    <h2 >Chi siamo?</h2>
  </div>
  <hr class="linea">
  <div class="row divfoto">
    <div class="textwho col">
      <h4>Piacere! Siamo Arianna , Joshua , Marco e Michele. In questa sezione del nostro sito troverete informazioni riguardanti i nostri scopi, le nostre passioni e ciò che ci spinge a 
        fare quello che facciamo. </h4>
    </div>
    <div class=" col offset-md-1">
    <img src="images/logoUnivPM.png" class="fotologo">
    </div>
  </div>
</div>
<div class="whopage1">
  <div class="row ">
    <div class="col-md-4">
      <img src="images/studenti.jpg" class="card-img immaginewho" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h2 class="card-title">Ci presentiamo!</h2>
        <h4>Siamo quattro ragazzi universitari appassionati di informatica che hanno creato 
          questa piattaforma per facilitare il processo, spesso tedioso, di trovare un alloggio per
          studenti come noi. Per ulteriori approfondimenti, visitare la sezione <a href="{{route('cosaOffriamo')}}"> Cosa offriamo </a>
        </h4>
      </div>
    </div>
  </div>
</div>

<div class="whopage1">
  <div class="row ">
    <div class="col-md-8">
      <div class="card-body">
        <h2 class="card-title">Cosa studiamo</h2>
        <h4>Siamo studenti di Ingegneria informatica e dell'automazione presso l'Università Politecnica delle Marche; per avere più informazioni
          sulla nostra posizione geografica consigliamo di visitare la pagina <a href="{{route('where')}}"> Dove siamo </a>
        </h4>
      </div>
    </div>
    <div class="col-md-4">
      <img src="images/ingegneria.jpg" class="card-img immaginewho" alt="...">
    </div>
  </div>
</div>
@endsection
