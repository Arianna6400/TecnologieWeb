@extends('layouts.public')

@section('title', 'Area Locatore')

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

    @csrf
    @if($alloggio->Tipo == 'Appartamento')
    <h2 class="titolo"> Inserisci il tuo {{$alloggio->Tipo}} </h2>
    @else
    <h2 class="titolo"> Inserisci la tua {{$alloggio->Tipo}} </h2>
    @endif
   <div class="contenitore" style=" margin-bottom: 100px;">
  {{ Form::open(array('route' => 'submit', 'id' => 'addproduct', 'files' => true, 'class' => 'contact-form')) }}
  @if($alloggio->Tipo == 'Appartamento')
  <div class="form-group">
        {{ Form::label('Ripostiglio', 'Disponibilità ripostiglio', ['class' => 'label-input']) }}
        {{ Form::select('Ripostiglio', ['1' => 'Disponibile', '0' => 'Non disponibile'], '', ['class' => 'text_label','id' => 'Ripostiglio']) }}
    </div>

    <div class="form-group">
        {{ Form::label('Sala', 'Disponibilità sala', ['class' => 'label-input']) }}
        {{ Form::select('Sala', ['1' => 'Disponibile', '0' => 'Non disponibile'], '', ['class' => 'text_label','id' => 'Sala']) }}
    </div>
    @endif
    <div class="form-group">
        {{ Form::label('SessoRichiesto', 'Sesso richiesto', ['class' => 'label-input']) }}
        {{ Form::select('SessoRichiesto', ['M' => 'Maschio', 'F' => 'Femmina'], '', ['class' => 'text_label','id' => 'SessoRichiesto']) }}
    </div>

    <div class="form-group">
        {{ Form::label('WiFi', 'Disponibilità WiFi', ['class' => 'label-input']) }}
        {{ Form::select('WiFi', ['1' => 'Disponibile', '0' => 'Non disponibile'], '', ['class' => 'text_label','id' => 'WiFi']) }}
    </div>
    @if($alloggio->Tipo == 'Appartamento')
    <div class="form-group">
        {{ Form::label('Garage', 'Disponibilità Garage', ['class' => 'label-input']) }}
        {{ Form::select('Garage', ['1' => 'Disponibile', '0' => 'Non disponibile'], '', ['class' => 'text_label','id' => 'Garage']) }}
    </div>
    @endif
    {{Form::hidden('Username', auth()->user()->Username)}}

    <div class="form-group">
        {{ Form::label('AngoloStudio', 'Disponibilità angolo studio', ['class' => 'label-input']) }}
        {{ Form::select('AngoloStudio', ['1' => 'Disponibile', '0' => 'Non disponibile'], '', ['class' => 'text_label','id' => 'AngoloStudio']) }}
    </div>
    @if($alloggio->Tipo == 'Appartamento')
    <div class="form-group">
        {{ Form::label('NumeroLocali', 'Numero di locali', ['class' => 'label-input']) }}
        {{ Form::text('NumeroLocali', '', ['class' => 'text_label', 'id' => 'NumeroLocali', 'required']) }}
            @if ($errors->first('NumeroLocali'))
                <ul class="errors">
                    @foreach ($errors->get('NumeroLocali') as $message)
                    <li>{{ $message }}</li>
                      @endforeach
                </ul>
                @endif
    </div>
    <div class="form-group">
        {{ Form::label('NumBagni', 'Numero Bagni', ['class' => 'label-input']) }}
        {{ Form::text('NumBagni', '', ['class' => 'text_label', 'id' => 'NumBagni', 'required']) }}
            @if ($errors->first('NumBagni'))
                <ul class="errors">
                    @foreach ($errors->get('NumBagni') as $message)
                    <li>{{ $message }}</li>
                      @endforeach
                </ul>
                @endif
    </div>
    <div class="form-group">
        {{ Form::label('PostiLettoTot', 'Posti Letto Totali', ['class' => 'label-input']) }}
        {{ Form::text('PostiLettoTot', '', ['class' => 'text_label', 'id' => 'PostiLettoTot', 'required']) }}
            @if ($errors->first('PostiLettoTot'))
                <ul class="errors">
                    @foreach ($errors->get('PostiLettoTot') as $message)
                    <li>{{ $message }}</li>
                      @endforeach
                </ul>
                @endif
    </div>
    @endif
    <div class="form-group">
        {{ Form::label('EtaMinima', 'Età Minima', ['class' => 'label-input']) }}
        {{ Form::text('EtaMinima', '', ['class' => 'text_label', 'id' => 'EtaMinima', 'required']) }}
            @if ($errors->first('EtaMinima'))
                <ul class="errors">
                    @foreach ($errors->get('EtaMinima') as $message)
                    <li>{{ $message }}</li>
                      @endforeach
                </ul>
                @endif
    </div>
    @if($alloggio->Tipo == 'Appartamento')
    <div class="form-group">
        {{ Form::label('NumStanzeLetto', 'Numero Stanze da Letto', ['class' => 'label-input']) }}
        {{ Form::text('NumStanzeLetto', '', ['class' => 'text_label', 'id' => 'NumStanzeLetto', 'required']) }}
            @if ($errors->first('NumStanzeLetto'))
                <ul class="errors">
                    @foreach ($errors->get('NumStanzeLetto') as $message)
                    <li>{{ $message }}</li>
                      @endforeach
                </ul>
                @endif
    </div>
    @endif
    @if($alloggio->Tipo == 'Stanza Singola')
    {{Form::hidden('PostiLettoTot', '1' )}}
    @endif
    @if($alloggio->Tipo == 'Stanza Doppia')
    {{Form::hidden('PostiLettoTot', '2' )}}
    @endif
    <div  class="wrap-input  rs1-wrap-input">
      {{ Form::submit('Conferma', ['style' => 'background-color: #32aaee; border: 0px; color: white; padding-top: -2%;' , 'class' => 'btn btn-primary btn-lg']) }}
    </div>

</div>


  @endsection
</html>
