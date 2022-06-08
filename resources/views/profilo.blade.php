@extends('layouts.public')

@section('title', 'Profilo Utente')

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/stile.css')}}">
    <script src="{{asset('js/functions.js')}}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
    $(function () {
      var actionUrl = "{{ route('modprofilo') }}";
      var formId = 'modificaprofilo';
    
      $("#conferma").on('click', function (event) {
        doFormValidation(actionUrl, formId);
    }); 
});
</script>
  </head>
  <body onload="setup()">

  @section('content')
  @csrf
  <h2 class="titolo">Profilo utente</h2>
  <div class= "contenitore" style="margin-bottom: 100px;">
      {{ Form::open(array('route' => 'modprofilo', 'id' => 'modificaprofilo', 'class' => 'contact-form')) }}
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
    <hr>
    <div class="cont">
      <h4>Informazioni di login :</h4>
    </div>
    <div  class="wrap-input  rs1-wrap-input">
      {{ Form::label('Username', 'Username :', ['class' => 'label-input']) }}
      {{ Form::text('Username', $utente->Username, ['class' => 'input', 'id' => 'inputusername', 'readonly' => 'true']) }}
    </div>
    <div  class="wrap-input  rs1-wrap-input">
      {{ Form::label('Password', 'Nuova password :', ['class' => 'label-input']) }}
      {{ Form::password('password', ['class' => 'input', 'id' => 'inputpassword', 'readonly' => 'true' , 'placeholder' => 'inserisci nuova password']) }}
    </div>
    <div  class="wrap-input">
      {{ Form::label('Password-confirm', 'Conferma password', ['class' => 'label-input']) }}
      {{ Form::password('password_confirmation', ['class' => 'input', 'id' => 'password-confirm', 'readonly' => 'true', 'placeholder' => 'conferma nuova password']) }}
    </div>
    <hr>
    <div class="cont">
      <h4>Ruolo :</h4>
    </div>
    <div  class="wrap-input  rs1-wrap-input">
      {{ Form::text('role', $utente->role, ['class' => 'input', 'id' => 'inputruolo', 'readonly' => 'true']) }}
    </div>
    <hr>
    <div class="form-row">
      <div class = 'btn btn-outline-success' id = 'conferma' >Conferma</div>
      <button type="button" id='modifica' class="btn btn-outline-success mr-sm-2" style=" background-color: orange; border: 0px; color: white; padding-top: -2%;" onclick="modify()">Modifica</button>
    </div>
  </div>

  @endsection

  </body>
</html>
