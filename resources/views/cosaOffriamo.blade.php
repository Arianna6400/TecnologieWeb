@extends('layouts.public')

@section('title', 'Cosa offriamo')

@section('content')
<div class="introwho">
</div>
<div class="intro2who">
  <div class="titolowho">
    <h2 >Cosa offriamo?</h2>
  </div>
  <hr class="linea">
  <div class="row divfoto">
    <div class="textwho col">
      <h4> Per agevolare il processo di offerta e ricerca dell'alloggio adatto per studenti,
      abbiamo creato questa piattaforma in cui i locatori potranno inserire le loro offerte, e i potenziali locatari avranno la possibilità
      di selezionare l'alloggio più adatto alle loro esigenze e mettersi in contatto con i proprietari attraverso la nostra sezione di messaggistica.</h4>
    </div>
    <div class=" col offset-md-1">
    <img src="images/logoUnivPM.png" class="fotologo">
    </div>
  </div>
</div>

<div class="whopage1">
  <div class="row ">
    <div class="col-md-4">
      <img src="images/locatore.jpg" class="card-img immaginewho" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h2 class="card-title">Cosa può fare un locatore?</h2>
        <h4>
        Una volta autenticato, un locatore avrà la possibilità di inserire le proprie offerte all'interno del sito, aggiungendo le caratteristiche
        che rispecchiano al meglio l'alloggio offerto. Attraverso una sezione dedicata, potrà osservare lo stato di interessamento dei suoi alloggi,
        ed eventualmente mettersi in contatto attraverso la piattaforma di messaggistica con gli utenti interessati.
        </h4>
      </div>
    </div>
  </div>
</div>

<div class="whopage1">
  <div class="row ">
    <div class="col-md-4">
      <img src="images/locatario.jpg" class="card-img immaginewho" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h2 class="card-title">Cosa può fare un locatario?</h2>
        <h4>
        Una volta autenticato, un locatario può scorrere all'interno del catalogo attraverso un filtraggio mirato per trovare l'alloggio che più
        rispecchia i suoi interessi. Una volta selezionata la sistemazione di interesse, potrà contattare il proprietario in modo tale da poter
        opzionare l'alloggio attraverso la piattaforma di messaggistica. 
        </h4>
      </div>
    </div>
  </div>
</div>

<div class="whopage1">
  <div class="row ">
    <div class="col-md-8">
      <div class="card-body">
        <h2 class="card-title">Hai dubbi?</h2>
        <h4> Nella sezione dedicata alle <a href="{{route('FAQ')}}"> FAQ </a> potrai trovare risposte a domande comuni.
        Nel caso sorga la necessità di ulteriori delucidazioni, non esitare a contattarci per posta elettronica!
        <br>
        <a href="mailto:s1093540@studenti.univpm.it">Contatta Arianna</a>
        <br>
        <a href="mailto:s1092456@studenti.univpm.it">Contatta Marco</a>
        <br>
        <a href="mailto:s1095953@studenti.univpm.it">Contatta Michele</a>
        <br>
        <a href="mailto:s1093269@studenti.univpm.it">Contatta Joshua</a>
        </h4>
      </div>
    </div>
    <div class="col-md-4">
      <img src="images/domanda.jpg" class="card-img immaginewho" alt="...">
    </div>
  </div>
</div>
@endsection

