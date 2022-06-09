
@extends('layouts.public')
@section('title', 'Catalogo Locatario')<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('css/stile.css')}}">

</head>
@section('content')
  <div class="introwho3">
  </div>

  <div class="intro" style="background-image: url(images/imagewall.jpg);">
      <div class="title2">
    <h2 class="benvenuto">Benvenuto/a {{ Auth::user()->Nome }} {{ Auth::user()->Cognome }} !</h2>
    <hr class="linea" style="border-bottom: 0px;">
     <div class="row divfoto">
         <div class="textwho col testo">
      <h5 style="color: black;"> Nella tua home potrai scorrere l'intero catalogo, e filtrare i risultati in modo da soddisfare i tuoi criteri di ricerca. Una volta trovato
          l'alloggio che fa al caso tuo, potrai opzionarlo e metterti in contatto con il locatore. Inoltre, potrai visualizzare il tuo
          profilo utente ed eventualmente modificare i tuoi dati. Buona navigazione!</h5>
    </div>
    <div class=" col offset-md-1">
    <img src="images/logouni.png" class="logo">
    </div>
  </div>
  </div>
</div>

<form action="{{route('home_filtrata')}}" method="GET">
  {{ csrf_field() }}
<div class="contenitore">    
  <div class="form-group">
    <h4 for="exampleInputEmail1" class="form1">Seleziona la città </h4>
    <input type="text" class="form-control" name="citta" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="inserisci città ">
  </div>
<div class="checkbutton">
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="tipoalloggio" id="inlineRadio1" value="Appartamento">
    <label class="form-check-label" for="inlineRadio1">appartamento</label>
  </div>

  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="tipoalloggio" id="inlineRadio2" value="Stanza singola">
    <label class="form-check-label" for="inlineRadio2">stanza singola </label>
  </div>

  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="tipoalloggio" id="inlineRadio3" value="Stanza doppia">
    <label class="form-check-label" for="inlineRadio3">stanza doppia</label>
  </div>
</div>
  <div class="searchbuttoncitta ">
    <button  type="submit" class="btn btn-primary">Cerca</button>
  </div>
</div>
</form>
<!-- filtri orizzonatali -->
<div class="orznt-fltr">
<!-- primo filtro -->
<div class="dropdown" style="display: inline-block;">
<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
Dimensione
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
<li><a class="dropdown-item" href="#">Da 50mq a 100mq</a></li>
<li><a class="dropdown-item" href="#">Da 101mq a 200mq</a></li>
<li><a class="dropdown-item" href="#">Da 201 a 300mq </a></li>
</ul>
</div>
<!-- secondo filtro -->
<div class="dropdown" style="display: inline-block;">
<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
Fascia di Prezzo
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
<li><a class="dropdown-item" href="#">Da 200€ a 300€</a></li>
<li><a class="dropdown-item" href="#">Da 301€ a 400€</a></li>
<li><a class="dropdown-item" href="#">Da 401€ a 500€</a></li>
</ul>
</div>
<!-- terzo filtro -->
<div class="dropdown" style="display: inline-block;">
<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
Posti letto totali
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
<li><a class="dropdown-item" href="#">1</a></li>
<li><a class="dropdown-item" href="#">2</a></li>
<li><a class="dropdown-item" href="#">3</a></li>
<li><a class="dropdown-item" href="#">4</a></li>
</ul>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<form action="{{route('catalogofiltrato')}}" method="GET">
{{ csrf_field() }}
<div class="vrtc_filter" style="box-shadow: 20px 20px 50px grey; float: right; right: 5%; position: absolute; width: 15%; padding: 2%;">
<div class="checkbutton">
<h6>Servizi Aggiuntivi</h6>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="servizi_aggiuntivi[]" id="Check3" value="sala">
<label class="form-check-label" for="Check3">Sala</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="servizi_aggiuntivi[]" id="Check4" value="ripostiglio">
<label class="form-check-label" for="Check4">Ripostiglio</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="servizi_aggiuntivi[]" id="Check5" value="garage">
<label class="form-check-label" for="Check5">Garage</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="servizi_aggiuntivi[]" id="Check6" value="wifi">
<label class="form-check-label" for="Check6">Wi-fi</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="servizi_aggiuntivi[]" id="Check7" value="angolo_studio">
<label class="form-check-label" for="Check7">Angolo studio</label>
</div>
</div>
<div>
<br>
<h6>Numero Locali</h6>
<div class="checkbutton">
<div class="form-check">
<input class="form-check-input" type="checkbox" name="numero_locali[]" id="Check8" value="2">
<label class="form-check-label" for="Check8">2</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="numero_locali[]" id="Check9" value="3">
<label class="form-check-label" for="Check9">3</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="numero_locali[]" id="Check10" value="+3">
<label class="form-check-label" for="Check10">+3</label>
</div>
</div>
</div>
<div>
<br>
<h6>Posti letto stanza</h6>
<div class="checkbutton">
<div class="form-check">
<input class="form-check-input" type="checkbox" name="posti_letto_stanza[]" id="Check11" value="2">
<label class="form-check-label" for="Check11">2</label>
</div>
</div>
</div>
<div>
<br>
<h6>Numero Bagni</h6>
<div class="checkbutton">
<div class="form-check">
<input class="form-check-input" type="checkbox" name="numero_bagni[]" id="Check14" value="2" >
<label class="form-check-label" for="Check14">2</label>
</div>
</div>
</div>
<div>
<br>
<h6>Numero stanze letto</h6>
<div class="checkbutton">
<div class="form-check">
<input class="form-check-input" type="checkbox" name="numero_stanze_letto[]" id="Check17" value="2" >
<label class="form-check-label" for="Check17">2</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="numero_stanze_letto[]" id="Check18" value="3" >
<label class="form-check-label" for="Check18">3</label>
</div><div class="form-check">
<input class="form-check-input" type="checkbox" name="numero_stanze_letto[]" id="Check19" value="+3" >
<label class="form-check-label" for="Check19">+3</label>
</div>
</div>
</div>
<div>
<br>
<h6>Età minima</h6>
<div class="checkbutton">
<div class="form-check">
<input class="form-check-input" type="checkbox" name="eta_minima[]" id="Check20" value="18" >
<label class="form-check-label" for="Check20">18</label>
</div><div class="form-check">
<input class="form-check-input" type="checkbox" name="eta_minima[]" id="Check20" value="25" >
<label class="form-check-label" for="Check20">25</label>
</div><div class="form-check">
<input class="form-check-input" type="checkbox" name="eta_minima[]" id="Check21" value="30" >
<label class="form-check-label" for="Check21">+30</label>
</div>
</div>
</div>
<div>
<h6>Sesso richiesto</h6>
<div class="checkbutton">
<div class="form-check">
<input class="form-check-input" type="radio" name="sesso_richiesto[]" id="Check22" value="M" >
<label class="form-check-label" for="Check22">Maschio</label>
</div><div class="form-check">
<input class="form-check-input" type="radio" name="sesso_richiesto[]" id="Check22" value="F" >
<label class="form-check-label" for="Check22">Femmina</label>
</div>
</div>
</div>
    <div class="searchbuttoncitta ">
    <button  type="submit" class="btn btn-primary" style=" background-color: orange; border: 0px; margin-top:6%; margin-bottom:-6%;">Applica Filtri</button>
  </div>
</div>
</form>
<div class="contenitore" style=" margin-bottom: 700px;">
@isset($alloggi)
@foreach($alloggi as $alloggio)
<div class="card mb-3" style="max-width: 800px;">
<div class="row no-gutters">
<div class="col-md-4">
@include('helpers/immaginiapp', ['attrs' => 'card-img', 'imgFile' => $alloggio->Foto])
</div>
<div class="col-md-8">
<div class="card-body">
<!-- nel titolo andra messo citta, via, numero civico e costo -->
<a href="{{route('offertalocatario',['id' => $alloggio->ID])}}" class="card-title">{{$alloggio->Tipo}} {{$alloggio->Citta}} in Via {{$alloggio->Via}}, {{$alloggio->Metratura}}mq, {{$alloggio->Costo}}€</a>
<!-- aggiungere descrizione -->
<p class="card-text"> {{$alloggio->Descrizione}} </p>
<p class="card-text"><small class="text-muted">Ultimo aggiornamento: {{$alloggio->updated_at}}</small></p>
</div>
</div>
</div>
</div>
@endforeach
@endisset
</div>
@endsection
</html>

