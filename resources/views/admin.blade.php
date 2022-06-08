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
      <h5 style="color: black; width: 110%;"> Nella tua home potrai visualizzare le analisi statistiche in determinati intervalli temporali, riguardanti le offerte di alloggio, le offerte di locazione,
      gli alloggi locati. Infine, potrai avere accesso all'inserimento e alla modifica delle FAQ. Buona navigazione! </h5>
    </div>
    <div class=" col offset-md-1">
    <img src="images/logouni.png" class="logo">
    </div>
  </div>
  </div>
</div>
@endsection
