@extends('layouts.public')

@section('title', 'Mie Offerte')

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
  <body>
  @section('content')
  <div class="introwho3">
  </div>

<div class="contenitore" style="margin-bottom: 300px;">

      @isset($catalogo_offerte)
        @foreach($catalogo_offerte as $alloggio)
                    <div class="card mb-3" style="max-width: 800px;">
              <div class="row no-gutters">
                    <div class="col-md-4">
                        @include('helpers/immaginiapp', ['attrs' => 'card-img', 'imgFile' => $alloggio->Foto])
                    </div>
                <div class="col-md-8">
                  <div class="card-body">
                      <!-- nel titolo andra messo citta, via, numero civico e costo -->

                      <a href="{{route('offerta',['id' => $alloggio->ID ])}}" class="card-title">{{$alloggio->Tipo}} {{$alloggio->Citta}} in Via {{$alloggio->Via}}, {{$alloggio->Metratura}}mq, {{$alloggio->Costo}}€ al mese</a>

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


