@extends('layouts.public')

@section('title', 'Opzionate')

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
    
      @isset($alloggi_opzionati)
        @foreach($alloggi_opzionati as $alloggio)
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
                    @if(Auth::user()->role == 'Locatore')
                        <p>Utenti che hanno opzionato la casa:
                        @isset($arrayUsername)
                            @foreach($arrayUsername as $key=>$value )
                                @if($key == $alloggio->ID)
                                    @foreach($value as $username)
                                    <!-- questa rotta deve fare la form di un messaggio -->
                                        <a href="{{route('viewutente', ['username'=> $username])}}">{{$username}},</a>
                                    @endforeach
                                @endif
                            @endforeach
                        @endisset
                    </p>
                    @endif
                    <div>
                    @if($alloggio->Disponibilita == 1)
                    <p>Ci sono ancora posti disponibili: <button style="background-color: green; height: 20px; width:20px; border-radius: 100px;"></button></p>
                    @else
                    <p>Alloggio pieno: <button style="background-color: red; height: 20px; width:20px; border-radius: 100px;"></button></p>
                    @endif
                    </div>
                    
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



