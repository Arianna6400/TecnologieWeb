@extends('layouts.public')

@section('title', 'Profilo Locatario Interessato')

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

  @section('content')
   <h2 class="titolo">Profilo utente</h2>
  @isset($utenteinteressato)
  @csrf
 <div class= "contenitore" style="margin-bottom: 100px;">
      <a class="btn btn-primary btn-lg" style= "background-color: #32aaee; border: 0px; color: white; padding-top: -2%;" type="submit" href="{{route('chatlocatore')}}">Contatta</a>
      <hr>
      <div class="cont">
        <h4>Informazioni anagrafiche di {{$utenteinteressato->Username}} :</h4>
        <div  class="wrap-input  rs1-wrap-input">
          {{ Form::label('Nome', 'Nome :', ['class' => 'label-input']) }}
          {{ Form::text('Nome', $utenteinteressato->Nome, ['class' => 'text_label', 'id' => 'Nome', 'readonly' => 'true']) }}
      </div>
      <div  class="wrap-input  rs1-wrap-input">
          {{ Form::label('Cognome', 'Cognome :', ['class' => 'label-input']) }}
          {{ Form::text('Cognome', $utenteinteressato->Cognome, ['class' => 'text_label', 'id' => 'Cognome', 'readonly' => 'true']) }}
      </div>
      <div  class="wrap-input  rs1-wrap-input">
          {{ Form::label('DataNascita', 'Data di nascita :', ['class' => 'label-input']) }}
          {{ Form::date('DataNascita', $utenteinteressato->DataNascita, ['class' => 'text_label', 'id' => 'DataNascita', 'readonly' => 'true']) }}
      </div>
      <div  class="wrap-input  rs1-wrap-input">
          {{ Form::label('Sesso', 'Sesso :', ['class' => 'label-input']) }}
          {{ Form::select('Sesso', ['M' => 'Uomo', 'F' => 'Donna'], $utenteinteressato->Sesso, ['class' => 'text_label','id' => 'Sesso', 'disabled']) }}
      </div>
      </div>

 </div>
 @endisset

  @endsection
  </html>
