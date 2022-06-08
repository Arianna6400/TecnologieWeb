@extends('layouts.public')

@section('title', 'Area Admin')

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
  </head>
  <body>

@section('content')
 <div class="introwho">
  </div>
  <div class="intro2who">
  <div class="titolowho">
    <h2 >Benvenuto/a {{ Auth::user()->Nome }} {{ Auth::user()->Cognome }}!</h2>
  </div>
  <hr class="linea">
  <div class="row divfoto">
    <div class="textwho col">
      <h4> Nella tua home potrai visualizzare le analisi statistiche in determinati intervalli temporali, riguardanti le offerte di alloggio, le offerte di locazione,
      gli alloggi locati. Infine, potrai avere accesso all'inserimento e alla modifica delle FAQ. Buona navigazione! </h4>
    </div>
    <div class=" col offset-md-1">
    <img src="images/logoUnivPM.png" class="fotologo">
    </div>
  </div>
</div>

@endsection
