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
    @csrf
    <h2 class="titolo">Modifica FAQ</h2>
     <div class="contenitore">
    {{ Form::open(array('route' => 'updatefaq', 'files' => true, 'class' => 'contact-form')) }}
    {{Form::hidden('ID', request('id'))}}
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
        {{ Form::submit('Conferma', ['style' => 'background-color: #32aaee; margin-top: 3%; border: 0px; color:white;' ,'class' => 'btn btn-outline-success mr-sm-2']) }}
    </div>
    </div>

  @endsection
</html>
