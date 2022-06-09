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
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/functionsalloggio.js')}}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
    $(function () {
      var actionUrl = "{{ route('modifyalloggio') }}";
      var formId = 'modificaalloggio';
      $("#conferma").on('click', function (event) {
        doFormValidation(actionUrl, formId);
    }); 
});
</script>
  </head>
  <body onload="setup()">
  @section('content')
  <h2 class="titolo">Visualizza l'offerta:</h2>
  <div class="contenitore" style="margin-bottom: 100px;">
  <meta name="csrf-token" content="{{csrf_token()}}" />
  @isset($miei_alloggi)
    @foreach($miei_alloggi as $miei)
      @if($miei->ID == request('id'))
        <form onclick="modify()" >
            <button class="btn btn-outline-success mr-sm-2" style=" background-color: #32aaee; border: 0px; color: white; padding-top: -2%; margin-bottom: 3%;" id="modifica" type="button">Modifica</button>
        </form>
        <form action="{{route('elimina_alloggio', ['id'=> $miei->ID])}}">
            <button class="btn btn-outline-success mr-sm-2" style=" background-color: #32aaee; border: 0px; color: white; padding-top: -2%; margin-bottom: 3%;" id="elimina" type="submit">Elimina</button>
        </form>
      @endif
    @endforeach
  @endisset
  
    @isset($offerta)
            @auth
                @if(auth()->user()->role== 'Locatario')
                    @if($offerta->Disponibilita != 0)
                        @empty($opzionateDa)
                                @csrf
                                    {{ Form::open(array('route' => array('opzionato', $offerta->ID), 'id' => 'addinterazione')) }}
                                    {{ Form::text('Username', Auth()->user()->Username, ['class' => 'input', 'id' => 'User' , 'required', 'hidden']) }}
                                    {{ Form::number('ID', $offerta->ID, ['class' => 'input', 'id' => 'offerta' , 'required' , 'hidden']) }}
                                    {{ Form::submit('Opziona', ['class' => 'btn btn-primary btn-lg']) }}
                        @endempty
                        @isset($opzionateDa)
                            <p>Non puoi opzionare perchè hai già opzionato un alloggio</p>
                        @endisset
                    @else
                        <p>Non puoi opzionare perchè alloggio è pieno</p>
                    @endif
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
      <h3 class="card-title label">{{$offerta->Tipo}} {{$offerta->Citta}} in Via {{$offerta->Via}}, {{$offerta->Metratura}}mq, {{$offerta->Costo}}€</h3>
      <p class="card-text label">{{$offerta->Descrizione}}</p>
      <p class="card-text"><small class="text-muted">Ultimo aggiornamento: {{$offerta->updated_at}}</small></p>
      @csrf
      {{ Form::open(array('route' => 'modifyalloggio', 'id' => 'modificaalloggio', 'class' => 'contact-form')) }}
      {{Form::hidden('ID',request('id'))}}
      <h4> Caratteristiche generali: </h4>
      <div class="list-group list-group-horizontal-sm">
        <li class="list-group-item formall" ><h5> Città: </h5>
        {{ Form::text('Citta', $offerta->Citta, ['class' => 'formall', 'id' => 'Citta']) }}</li>

        <li class="list-group-item formall" ><h5> Via: </h5>
        {{ Form::text('Via', $offerta->Via, ['class' => 'formall', 'id' => 'Via']) }}</li>

        <li class="list-group-item formall" ><h5> Numero Civico: </h5>
        {{ Form::number('NumCivico', $offerta->NumCivico, ['class' => 'formall', 'id' => 'NumCivico']) }}</li>

        <li class="list-group-item label" ><h5> Tipo: </h5> <p class="label">{{$offerta->Tipo}}</p></li>

        <li class="list-group-item label"><h5 > Luogo: </h5> <p class="label">Via {{$offerta->Via}}, {{$offerta->NumCivico}}, {{$offerta->Citta}}</p> </li>

        <li class="list-group-item"><h5> Costo: </h5> <p class="label">{{$offerta->Costo}}€ </p>
        {{ Form::number('Costo', $offerta->Costo, ['class' => 'formall', 'id' => 'Costo']) }}<p class="formall">€</p></li>

        <li class= "list-group-item"><h5> Periodo disponibilità: </h5> <p class="label">Dal {{$offerta->PeriodoInizio}} al {{$offerta->PeriodoFine}}</p>
        Dal {{ Form::date('PeriodoInizio', $offerta->PeriodoInizio, ['class' => 'formall', 'id' => 'inputperinizio']) }} al 
        {{ Form::date('PeriodoFine', $offerta->PeriodoFine, ['class' => 'formall', 'id' => 'PeriodoFine']) }}</li>

        <li class= "list-group-item"><h5> Metratura: </h5> <p class="label">{{$offerta->Metratura}}mq</p>
        {{ Form::number('Metratura', $offerta->Metratura, ['class' => 'formall', 'id' => 'Metratura']) }}<p class="formall">mq</p></li>

        <li class="list-group-item formall" ><h5> Descrizione: </h5>
        {{ Form::textarea('Descrizione', $offerta->Descrizione, ['class' => 'formall', 'id' => 'Descrizione']) }}</li>

        <li class= "list-group-item label"><h5> Disponibilità: </h5>
                   <div>
                    @if($offerta->Disponibilita == 1)
                    <p class="label">Ci sono ancora posti disponibili: <button style="background-color: green; height: 20px; width:20px; border-radius: 100px;"></button></p>
                    @else
                    <p class="label">Alloggio pieno: <button style="background-color: red; height: 20px; width:20px; border-radius: 100px;"></button></p>
                    @endif
                    </div> </li>
      </div>
      <br>
      <h4> Caratteristiche particolari: </h4>
      <div class="list-group list-group-horizontal-sm">
      @if($offerta->Tipo == 'Appartamento')
        <li class="list-group-item"><h5> Ripostiglio: </h5> <div>
                    @if($offerta->Ripostiglio == 1)
                    <p class="label">Sì</p>
                    @else
                    <p class="label">No</p>
                    @endif
                    </div>
        {{ Form::select('Ripostiglio', ['1' => 'Si', '0' => 'No' ], $offerta->Ripostiglio, ['class' => 'formall','id' => 'Ripostiglio']) }}</li>
        
        <li class="list-group-item"><h5> Sala: </h5> <div>
                    @if($offerta->Sala == 1)
                    <p class="label">Sì</p>
                    @else
                    <p class="label">No</p>
                    @endif
                    </div>
        {{ Form::select('Sala', ['1' => 'Si', '0' => 'No' ], $offerta->Sala, ['class' => 'formall','id' => 'Sala']) }}</li>
      @endif
        <li class="list-group-item"><h5> Sesso Richiesto: </h5> <div>
                    @if($offerta->SessoRichiesto == 'M')
                    <p class="label">Maschio</p>
                    @else
                    <p class="label">Femmina</p>
                    @endif
                    </div>
        {{ Form::select('SessoRichiesto', ['M' => 'Uomo', 'F' => 'Donna' ], $offerta->SessoRichiesto, ['class' => 'formall','id' => 'SessoRichiesto']) }}</li>

        <li class="list-group-item"><h5> Wi-fi: </h5> <div>
                    @if($offerta->WiFi == 1)
                    <p class="label">Sì</p>
                    @else
                    <p class="label">No</p>
                    @endif
                    </div> 
        {{ Form::select('Wifi', ['1' => 'Si', '0' => 'No' ], $offerta->WiFi, ['class' => 'formall','id' => 'Wifi']) }}</li>

        @if($offerta->Tipo == 'Appartamento')
        <li class="list-group-item"><h5> Garage: </h5> <div>
                    @if($offerta->Garage == 1)
                    <p class="label">Sì</p>
                    @else
                    <p class="label">No</p>
                    @endif
                    </div>
        {{ Form::select('Garage', ['1' => 'Si', '0' => 'No' ], $offerta->Garage, ['class' => 'formall','id' => 'Garage']) }}</li>
        @endif

        <li class="list-group-item"><h5> Angolo studio: </h5> <div>
                    @if($offerta->AngoloStudio == 1)
                    <p class="label">Sì</p>
                    @else
                    <p class="label">No</p>
                    @endif
                    </div>
        {{ Form::select('AngoloStudio', ['1' => 'Si', '0' => 'No' ], $offerta->AngoloStudio, ['class' => 'formall','id' => 'AngoloStudio']) }}</li>

        @if($offerta->Tipo == 'Appartamento')
          <li class="list-group-item"><h5> Numero Locali: </h5> <p class="label"> {{$offerta->NumeroLocali}} </p>
          {{ Form::number('NumeroLocali', $offerta->NumeroLocali, ['class' => 'formall', 'id' => 'NumeroLocali']) }}</li>

          <li class="list-group-item"><h5> Numero Bagni: </h5> <p class="label"> {{$offerta->NumBagni}} </p>
          {{ Form::number('NumBagni', $offerta->NumBagni, ['class' => 'formall', 'id' => 'NumBagni']) }}</li>
              
          <li class="list-group-item"><h5> Posti Letto Totali: </h5> <p class="label"> {{$offerta->PostiLettoTot}} </p>
          {{ Form::number('PostiLettoTot', $offerta->PostiLettoTot, ['class' => 'formall', 'id' => 'PostiLettoTot']) }}</li>
            
          <li class="list-group-item"><h5> Numero Stanze Letto: </h5> <p class="label"> {{$offerta->NumStanzeLetto}} </p>
          {{ Form::number('NumStanzeLetto', $offerta->NumStanzeLetto, ['class' => 'formall', 'id' => 'NumStanzeLetto']) }}</li>
        @endif
        <li class="list-group-item"><h5> Età Minima Richiesta: </h5> <p class="label"> {{$offerta->EtaMinima}} </p> 
        {{ Form::number('EtaMinima', $offerta->EtaMinima, ['class' => 'formall', 'id' => 'EtaMinima']) }}</li>

      </div>
      <div class="titolowho">
        <div class = 'btn btn-outline-success' id='conferma' >Conferma</div>
      </div>
     </div>
  @endisset
  </div>
  @endsection
    
  </body>
</html>
