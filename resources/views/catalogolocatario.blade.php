
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
 <body style="background-image: url(images/Geometric3.png);">
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

<form action="{{route('catalogofiltrato')}}" method="GET">
  {{ csrf_field() }}
<div class="contenitore">    
  <div class="form-group">
    <h4 for="exampleInputEmail1" class="form1">Seleziona la città </h4>
    <input type="text" class="form-control" name="citta" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="inserisci città ">
  </div>
<div class="checkbutton">
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" name="tipo_alloggio[]" id="Check27" value="appartamento">
    <label class="form-check-label" for="Check27">Appartamento</label>
  </div>

  <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="tipo_alloggio[]" id="Check28" value="stanza_singola">
        <label class="form-check-label" for="Check28">Stanza singola</label>
  </div>

  <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="tipo_alloggio[]" id="Check29" value="stanza_doppia">
        <label class="form-check-label" for="Check29">Stanza doppia</label>
  </div>
</div>
  <div class="searchbuttoncitta ">
    <button  type="submit" class="btn btn-primary">Cerca</button>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<div class="vrtc_filter" style="box-shadow: 20px 20px 50px grey; float: right; right: 5%; position: absolute; width: 15%; padding: 2%;">
<div class="checkbutton">
<h6>Dimensione</h6>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="dimensione[]" id="Check0" value="metratura_1">
<label class="form-check-label" for="Check0">50mq-100mq</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="dimensione[]" id="Check1" value="metratura_2">
<label class="form-check-label" for="Check1">101mq-200mq</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="dimensione[]" id="Check2" value="metratura_3">
<label class="form-check-label" for="Check2">+201mq</label>
</div>
</div>
    <div class="checkbutton">
<h6>Fascia prezzo</h6>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="prezzo[]" id="Check3" value="prezzo_1">
<label class="form-check-label" for="Check3">200€-300€</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="prezzo[]" id="Check4" value="prezzo_2">
<label class="form-check-label" for="Check4">301€-400€</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="prezzo[]" id="Check5" value="prezzo_3">
<label class="form-check-label" for="Check5">+401€</label>
</div>
</div>
<div class="checkbutton">
<h6>Posti letto totali</h6>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="posti_letto[]" id="Check6" value="postiletto_1">
<label class="form-check-label" for="Check6">1</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="posti_letto[]" id="Check7" value="postiletto_2">
<label class="form-check-label" for="Check7">2</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="posti_letto[]" id="Check8" value="postiletto_3">
<label class="form-check-label" for="Check8">3</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="posti_letto[]" id="Check9" value="postiletto_4">
<label class="form-check-label" for="Check9">4</label>
</div>
</div>
<div class="checkbutton">
<h6>Servizi Aggiuntivi</h6>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="servizi_aggiuntivi[]" id="Check10" value="sala">
<label class="form-check-label" for="Check10">Sala</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="servizi_aggiuntivi[]" id="Check11" value="ripostiglio">
<label class="form-check-label" for="Check11">Ripostiglio</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="servizi_aggiuntivi[]" id="Check12" value="garage">
<label class="form-check-label" for="Check12">Garage</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="servizi_aggiuntivi[]" id="Check13" value="wifi">
<label class="form-check-label" for="Check13">Wi-fi</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="servizi_aggiuntivi[]" id="Check14" value="angolo_studio">
<label class="form-check-label" for="Check14">Angolo studio</label>
</div>
</div>
<div>
<br>
<h6>Numero Locali</h6>
<div class="checkbutton">
<div class="form-check">
<input class="form-check-input" type="checkbox" name="numero_locali[]" id="Check15" value="2">
<label class="form-check-label" for="Check15">2</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="numero_locali[]" id="Check16" value="3">
<label class="form-check-label" for="Check16">3</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="numero_locali[]" id="Check17" value="+3">
<label class="form-check-label" for="Check17">+3</label>
</div>
</div>
</div>
<div>
<br>
<h6>Numero Bagni</h6>
<div class="checkbutton">
<div class="form-check">
<input class="form-check-input" type="checkbox" name="numero_bagni[]" id="Check18" value="1" >
<label class="form-check-label" for="Check18">1</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="numero_bagni[]" id="Check19" value="2" >
<label class="form-check-label" for="Check19">2+</label>
</div>
</div>
</div>
<div>
<br>
<h6>Numero stanze letto</h6>
<div class="checkbutton">
<div class="form-check">
<input class="form-check-input" type="checkbox" name="numero_stanze_letto[]" id="Check20" value="2" >
<label class="form-check-label" for="Check20">2</label>
</div>
<div class="form-check">
<input class="form-check-input" type="checkbox" name="numero_stanze_letto[]" id="Check21" value="3" >
<label class="form-check-label" for="Check21">3</label>
</div><div class="form-check">
<input class="form-check-input" type="checkbox" name="numero_stanze_letto[]" id="Check22" value="+3" >
<label class="form-check-label" for="Check22">+3</label>
</div>
</div>
</div>
<div>
<br>
<h6>Età minima</h6>
<div class="checkbutton">
<div class="form-check">
<input class="form-check-input" type="checkbox" name="eta_minima[]" id="Check23" value="18" >
<label class="form-check-label" for="Check23">18+</label>
</div><div class="form-check">
<input class="form-check-input" type="checkbox" name="eta_minima[]" id="Check24" value="25" >
<label class="form-check-label" for="Check24">25+</label>
</div><div class="form-check">
<input class="form-check-input" type="checkbox" name="eta_minima[]" id="Check25" value="30" >
<label class="form-check-label" for="Check25">30+</label>
</div>
</div>
</div>
<div>
<h6>Sesso richiesto</h6>
<div class="checkbutton">
<div class="form-check">
<input class="form-check-input" type="radio" name="sesso_richiesto[]" id="Check26" value="M" >
<label class="form-check-label" for="Check26">Maschio</label>
</div><div class="form-check">
<input class="form-check-input" type="radio" name="sesso_richiesto[]" id="Check26" value="F" >
<label class="form-check-label" for="Check26">Femmina</label>
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
<a href="{{route('offerta',['id' => $alloggio->ID])}}" class="card-title">{{$alloggio->Tipo}} {{$alloggio->Citta}} in Via {{$alloggio->Via}}, {{$alloggio->Metratura}}mq, {{$alloggio->Costo}}€</a>
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
 </body>
</html>

