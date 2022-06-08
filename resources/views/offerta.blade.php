@extends('layouts.public')

@section('title', 'Offerta')

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
  <h2 class="titolo">Visualizza l'offerta:</h2>
  <div class="contenitore" style="margin-bottom: 100px;">

  @isset($miei_alloggi)
    @foreach($miei_alloggi as $miei)
      @if($miei->ID == request('id'))
      <a class="btn btn-primary btn-lg" type="submit" href="...">Modifica</a>
      <a class="btn btn-primary btn-lg" type="submit" href="{{route('elimina_alloggio', ['id'=> $miei->ID])}}">Elimina</a>
      @endif
    @endforeach
  @endisset
  
    @isset($offerta)
            @auth
                @if(auth()->user()->role== 'Locatario')
                    @if($offerta->Disponibilita == 0)
                        <p>Non puoi opzionare perchè alloggio è pieno</p>
                    @endif
                        @isset($esito)
                                @csrf
                                    {{ Form::open(array('route' => array('opzionato', $offerta->ID), 'id' => 'addinterazione')) }}
                                    {{ Form::text('Username', Auth()->user()->Username, ['class' => 'input', 'id' => 'User' , 'required', 'hidden']) }}
                                    {{ Form::number('ID', $offerta->ID, ['class' => 'input', 'id' => 'offerta' , 'required' , 'hidden']) }}
                                    {{ Form::submit('Opziona', ['class' => 'btn btn-primary btn-lg']) }}
                        @endisset 
                        @empty($esito)
                            <p>Non puoi opzionare perchè hai già opzionato un alloggio</p>
                        @endempty
                @endif
            @endauth
            @guest
                <a class="btn btn-primary btn-lg"type="submit"href="{{route('login')}}">Opziona</a>
            @endguest

  <div class="card mb-3">
      <div class="card-img-top">
      @include('helpers/immaginiapp', ['attrs' => 'card-img', 'imgFile' => $offerta->Foto])
      </div>
      <div class="card-body">
      <h3 class="card-title">{{$offerta->Tipo}} {{$offerta->Citta}} in Via {{$offerta->Via}}, {{$offerta->Metratura}}mq, {{$offerta->Costo}}€</h3>
      <p class="card-text">{{$offerta->Descrizione}}</p>
      <p class="card-text"><small class="text-muted">Ultimo aggiornamento: {{$offerta->updated_at}}</small></p>
      <h4> Caratteristiche generali: </h4>
      <div class="list-group list-group-horizontal-sm">
        <li class="list-group-item"><h5> Tipo: </h5> {{$offerta->Tipo}} </li>
        <li class="list-group-item"><h5> Luogo: </h5> Via {{$offerta->Via}}, {{$offerta->NumCivico}}, {{$offerta->Citta}} </li>
        <li class="list-group-item"><h5> Costo: </h5> {{$offerta->Costo}}€ </li>
        <li class= "list-group-item"><h5> Periodo disponibilità: </h5> Dal {{$offerta->PeriodoInizio}} al {{$offerta->PeriodoFine}}</li>
        <li class= "list-group-item"><h5> Metratura: </h5> {{$offerta->Metratura}}mq </li>
        <li class= "list-group-item"><h5> Disponibilità: </h5>
                   <div>
                    @if($offerta->Disponibilita == 1)
                    <p>Ci sono ancora posti disponibili: <button style="background-color: green; height: 20px; width:20px; border-radius: 100px;"></button></p>
                    @else
                    <p>Alloggio pieno: <button style="background-color: red; height: 20px; width:20px; border-radius: 100px;"></button></p>
                    @endif
                    </div> </li>
      </div>
      <br>
      <h4> Caratteristiche particolari: </h4>
      <div class="list-group list-group-horizontal-sm">
      @if($offerta->Tipo == 'Appartamento')
        <li class="list-group-item"><h5> Ripostiglio: </h5> <div>
                    @if($offerta->Ripostiglio == 1)
                    <p>Sì</p>
                    @else
                    <p>No</p>
                    @endif
                    </div> </li>
        <li class="list-group-item"><h5> Sala: </h5> <div>
                    @if($offerta->Sala == 1)
                    <p>Sì</p>
                    @else
                    <p>No</p>
                    @endif
                    </div> </li>
      @endif
        <li class="list-group-item"><h5> Sesso Richiesto: </h5> <div>
                    @if($offerta->SessoRichiesto == 'M')
                    <p>Maschio</p>
                    @else
                    <p>Femmina</p>
                    @endif
                    </div> </li>
        <li class="list-group-item"><h5> Wi-fi: </h5> <div>
                    @if($offerta->WiFi == 1)
                    <p>Sì</p>
                    @else
                    <p>No</p>
                    @endif
                    </div> </li>
        @if($offerta->Tipo == 'Appartamento')
        <li class="list-group-item"><h5> Garage: </h5> <div>
                    @if($offerta->Garage == 1)
                    <p>Sì</p>
                    @else
                    <p>No</p>
                    @endif
                    </div> </li>
        @endif
        <li class="list-group-item"><h5> Angolo studio: </h5> <div>
                    @if($offerta->AngoloStudio == 1)
                    <p>Sì</p>
                    @else
                    <p>No</p>
                    @endif
                    </div> </li>
        @if($offerta->Tipo == 'Appartamento')
                <li class="list-group-item"><h5> Numero Locali: </h5> {{$offerta->NumeroLocali}} </li>
                <li class="list-group-item"><h5> Numero Bagni: </h5> {{$offerta->NumBagni}} </li>
                <li class="list-group-item"><h5> Posti Letto Totali: </h5> {{$offerta->PostiLettoTot}} </li>
                <li class="list-group-item"><h5> Numero Stanze Letto: </h5> {{$offerta->NumStanzeLetto}} </li>
        @endif
        <li class="list-group-item"><h5> Età Minima Richiesta: </h5> {{$offerta->EtaMinima}} </li>
      </div>
     </div>
  @endisset
  </div>
  @endsection
    
  </body>
</html>
