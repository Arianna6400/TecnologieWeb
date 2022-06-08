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
    <script src="{{asset('js/functions.js')}}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  </head>

  <body>
  @section('content')
  @csrf
  <h2 class="titolo">Profilo utente</h2>
 <div class= "contenitore" style="margin-bottom: 100px;">
      {{ Form::open(array('route' => 'chatlocatore', 'id' => 'modificaprofilo', 'class' => 'contact-form')) }}
      <div class="cont">
        <h4>Informazioni anagrafiche :</h4>
      </div>
      <div  class="wrap-input  rs1-wrap-input">
          {{ Form::label('Nome', 'Nome :', ['class' => 'label-input']) }}
          {{ Form::text('Nome', $utente->Nome, ['class' => 'input', 'id' => 'inputnome', 'readonly' => 'true']) }}
      </div>
      <div  class="wrap-input  rs1-wrap-input">
          {{ Form::label('Cognome', 'Cognome :', ['class' => 'label-input']) }}
          {{ Form::text('Cognome', $utente->Cognome, ['class' => 'input', 'id' => 'inputcognome', 'readonly' => 'true']) }}
      </div>
      <div  class="wrap-input  rs1-wrap-input">
          {{ Form::label('DataNascita', 'Data di nascita :', ['class' => 'label-input']) }}
          {{ Form::date('DataNascita', $utente->DataNascita, ['class' => 'input', 'id' => 'inputnascita', 'readonly' => 'true']) }}
      </div>
      <div  class="wrap-input  rs1-wrap-input">
          {{ Form::label('Sesso', 'Sesso :', ['class' => 'label-input']) }}
          {{ Form::select('Sesso', ['M' => 'Uomo', 'F' => 'Donna'], $utente->Sesso, ['class' => 'input','id' => 'inputsesso', 'disabled']) }}
      </div>
      <div  class="wrap-input  rs1-wrap-input">
      {{ Form::label('Username', 'Username :', ['class' => 'label-input']) }}
      {{ Form::text('Username', $utente->Username, ['class' => 'input', 'id' => 'inputusername', 'readonly' => 'true']) }}
    </div>
    <hr>
    <div  class="wrap-input  rs1-wrap-input titolo">
        {{ Form::submit('Contatta', ['style' => 'background-color: #32aaee; border: 0px; color: white; padding-top: -2%;' , 'class' => 'btn btn-primary btn-lg']) }}
    </div>

  </div>

  @endsection
  </body>
  </html>
