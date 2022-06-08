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

    @csrf
    <h2 class="titolo">Inserisci una nuova FAQ</h2>
<div class="contenitore" style=" margin-bottom: 100px;">
    {{ Form::open(array('route' => 'addfaq', 'files' => true, 'class' => 'contact-form')) }}
    <div class="form-row ">
    <div class="form-group form">
        {{ Form::label('Domanda', 'Domanda', ['class' => 'label-input']) }}
        {{ Form::textarea('Domanda', '', ['class' => 'text_label', 'id' => 'Domanda' , 'required']) }}
            @if ($errors->first('Domanda'))
                <ul class="errors">
                    @foreach ($errors->get('Domanda') as $message)
                    <li>{{ $message }}</li>
                      @endforeach
                </ul>
            @endif
    </div>
    <div class="form-group form">
        {{ Form::label('Risposta', 'Risposta', ['class' => 'label-input']) }}
        {{ Form::textarea('Risposta', '', ['class' => 'text_label', 'id' => 'Risposta' , 'required']) }}
            @if ($errors->first('Risposta'))
                <ul class="errors">
                    @foreach ($errors->get('Risposta') as $message)
                    <li>{{ $message }}</li>
                      @endforeach
                </ul>
            @endif
    </div>
    </div>
    <div  class="wrap-input  rs1-wrap-input titolo">
        {{ Form::submit('Conferma', ['style' => 'background-color: #32aaee; border: 0px; color: white; padding-top: -2%;' , 'class' => 'btn btn-primary btn-lg']) }}
    </div>
    </div>

  @endsection
</html>
