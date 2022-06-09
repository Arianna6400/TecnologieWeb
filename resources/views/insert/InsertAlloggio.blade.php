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
    <h2 class="titolo">Inserisci il tuo alloggio</h2>
  <div class="contenitore" style=" margin-bottom: 100px;">
    {{ Form::open(array('route' => 'insertcaratteristiche', 'id' => 'addproduct', 'files' => true, 'class' => 'contact-form')) }}
    <div class="form-row ">
    <div class="form-group form spazio">
        {{ Form::label('Citta', 'Città', ['class' => 'label-input']) }}
        {{ Form::text('Citta', '', ['class' => 'text_label', 'id' => 'Citta' , 'required']) }}
            @if ($errors->first('Citta'))
                <ul class="errors">
                    @foreach ($errors->get('Citta') as $message)
                    <li>{{ $message }}</li>
                      @endforeach
                </ul>
                @endif
    </div>
    <div class="form-group form spazio">
        {{ Form::label('Via', 'Via', ['class' => 'label-input']) }}
        {{ Form::text('Via', '', ['class' => 'text_label', 'id' => 'Via', 'required']) }}
            @if ($errors->first('Via'))
                <ul class="errors">
                    @foreach ($errors->get('Via') as $message)
                    <li>{{ $message }}</li>
                      @endforeach
                </ul>
                @endif
    </div>
    <div class="form-group form spazio">
        {{ Form::label('NumCivico', 'Numero Civico', ['class' => 'label-input']) }}
        {{ Form::number('NumCivico', '', ['class' => 'text_label', 'id' => 'NumCivico', 'required']) }}
            @if ($errors->first('NumCivico'))
                <ul class="errors">
                    @foreach ($errors->get('NumCivico') as $message)
                    <li>{{ $message }}</li>
                      @endforeach
                </ul>
                @endif
    </div>
</div>
    <div class="form-group form ">
        {{ Form::label('Costo', 'Costo', ['class' => 'label-input']) }}
        {{ Form::number('Costo', '', ['style' => 'width: 100%;' ,'class' => 'text_label', 'id' => 'Costo', 'required']) }}
            @if ($errors->first('Costo'))
                <ul class="errors">
                    @foreach ($errors->get('Costo') as $message)
                    <li>{{ $message }}</li>
                      @endforeach
                </ul>
                @endif
    </div>
    <div class="form-row ">
    <div class="form-group form ">
        {{ Form::label('PeriodoInizio', 'Periodo inizio disponibilità', ['class' => 'label-input']) }}
        {{ Form::date('PeriodoInizio', '', ['class' => 'text_label', 'id' => 'PeriodoInizio', 'required']) }}
            @if ($errors->first('PeriodoInizio'))
                <ul class="errors">
                    @foreach ($errors->get('PeriodoInizio') as $message)
                    <li>{{ $message }}</li>
                      @endforeach
                </ul>
                @endif
    </div>
    <div class="form-group form spazio">
        {{ Form::label('PeriodoFine', 'Periodo fine disponibilità', ['class' => 'label-input']) }}
        {{ Form::date('PeriodoFine', '', ['class' => 'text_label', 'id' => 'PeriodoFine', 'required']) }}
            @if ($errors->first('PeriodoFine'))
                <ul class="errors">
                    @foreach ($errors->get('PeriodoFine') as $message)
                    <li>{{ $message }}</li>
                      @endforeach
                </ul>
                @endif
    </div>
</div>
    <div class="form-group form">
        {{ Form::label('Metratura', 'Metratura', ['class' => 'label-input']) }}
        {{ Form::number('Metratura', '', ['class' => 'text_label', 'id' => 'Metratura', 'required']) }}
            @if ($errors->first('Metratura'))
                <ul class="errors">
                    @foreach ($errors->get('Metratura') as $message)
                    <li>{{ $message }}</li>
                      @endforeach
                </ul>
                @endif
    </div>
    <div class="form-group form">
        {{ Form::label('Disponibilita', 'Disponibilità', ['class' => 'label-input']) }}
        {{ Form::select('Disponibilita', ['1' => 'Disponibile', '0' => 'Non disponibile'], '', ['class' => 'text_label','id' => 'Disponibilita', 'required']) }}
    </div>
    <div class="form-group  form">
        {{ Form::label('Descrizione', 'Descrizione', ['class' => 'label-input']) }}
        {{ Form::textarea('Descrizione', '', ['class' => 'text_label', 'id' => 'Descrizione', 'rows'=>3, 'required']) }}
            @if ($errors->first('Descrizione'))
                <ul class="errors">
                    @foreach ($errors->get('Descrizione') as $message)
                    <li>{{ $message }}</li>
                      @endforeach
                </ul>
                @endif
    </div>
    <div class="form-group form">
        {{ Form::label('Tipo', 'Tipo', ['class' => 'label-input']) }}
        {{ Form::select('Tipo', ['Appartamento' => 'Appartamento', 'Stanza Singola' => 'Stanza Singola','Stanza Doppia'=>'Stanza Doppia'], '', ['style' => 'width: 100%;' ,'class' => 'text_label','id' => 'Tipo']) }}
    </div>

    <div  class="wrap-input  rs1-wrap-input  form">
                {{ Form::label('Foto', 'Immagine', ['class' => 'label-input']) }}
                {{ Form::file('Foto', ['style' => 'width: 100%;' ,'class' => 'text_label', 'id' => 'Foto']) }}
                @if ($errors->first('Foto'))
                <ul class="errors">
                    @foreach ($errors->get('Foto') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
    </div>
    {{ Form::hidden('created_at', date("Y-m-d H:i:s"))}}
    {{ Form::hidden('updated_at', date("Y-m-d H:i:s"))}}
    <div  class="wrap-input  rs1-wrap-input titolo">
        {{ Form::submit('Avanti', ['style' => 'background-color: #32aaee; border: 0px; color: white; padding-top: -2%;' , 'class' => 'btn btn-primary btn-lg']) }}
    </div>

  </div>
  
  @endsection
</html>
