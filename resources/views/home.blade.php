@extends('layouts.public')

@section('title', 'Home')

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
    <h2 >Benvenuto/a!</h2>
  </div>
  <hr class="linea">
  <div class="row divfoto">
    <div class="textwho col">
      <h4> Nella home potrai vedere il catalogo degli alloggi disponibili, effettuando anche un filtraggio iniziale ridotto. Se sei
      un utente già registrato, ti consigliamo di effettuare il Login. Se sei un utente guest ancora non registrato, corri a registrarti
      per poter usufruire al meglio del sito!</h4>
    </div>
    <div class=" col offset-md-1">
    <img src="images/logoUnivPM.png" class="fotologo">
    </div>
  </div>
</div>
<form action="{{route('home_filtrata')}}" method="GET">
  {{ csrf_field() }}
<div class="contenitore">    
  <div class="form-group">
    <h4 for="exampleInputEmail1" class="form1">Seleziona la città </h4>
    <input type="text" class="form-control" name="citta" id="exampleInputEmail1" placeholder="inserisci città ">
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

<div class="catalogo">
    
        @empty($filtrati)
        @foreach($catalogo_intero as $alloggio)
          <div class="card mb-3" style="max-width: 800px;">
              <div class="row no-gutters">
                <div class="col-md-4">
                  @include('helpers/immaginiapp', ['attrs' => 'card-img', 'imgFile' => $alloggio->Foto])
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                      <!-- nel titolo andra messo citta, via, numero civico e costo -->
                      <a href="{{route('offerta',['id' => $alloggio->ID ])}}" class="card-title">{{$alloggio->Tipo}} {{$alloggio->Citta}} in Via {{$alloggio->Via}}, {{$alloggio->Metratura}}mq, {{$alloggio->Costo}}€</a>
                    <!-- aggiungere descrizione -->
                    <p class="card-text"> {{$alloggio->Descrizione}} </p>
                    <p class="card-text"><small class="text-muted">Ultimo aggiornamento: {{$alloggio->updated_at}}</small></p>
                  </div>
                </div>
              </div>
            </div>
        @endforeach
        @include('pagination.paginator', ['paginator' => $catalogo_intero])
       @endempty
  
      @isset($filtrati)
        @foreach($filtrati as $alloggio)
                    <div class="card mb-3" style="max-width: 800px;">
              <div class="row no-gutters">
                <div class="col-md-4">
                  @include('helpers/immaginiapp', ['attrs' => 'card-img', 'imgFile' => $alloggio->Foto])
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                      <!-- nel titolo andra messo citta, via, numero civico e costo -->
                      <a href="{{route('offerta',['id' => $alloggio->ID ])}}" class="card-title">{{$alloggio->Tipo}} {{$alloggio->Citta}} in Via {{$alloggio->Via}}, {{$alloggio->Metratura}}mq, {{$alloggio->Costo}}€</a>
                    <!-- aggiungere descrizione -->
                    <p class="card-text"> {{$alloggio->Descrizione}} </p>
                    <p class="card-text"><small class="text-muted">Ultimo aggiornamento: {{$alloggio->updated_at}}</small></p>
                  </div>
                </div>
              </div>
            </div>
        @endforeach
        @include('pagination.paginator', ['paginator' => $filtrati , 'data'=>$data])
       @endisset
</div>
  @endsection
    
  </body>
</html>
