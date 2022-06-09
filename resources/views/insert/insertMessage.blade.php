@extends('layouts.public')
@section('title', 'Nuovo messaggio')<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/stile.css')}}">
</head>
<body>
@section('content')
<div class="introwho3">
</div>
@csrf
<h2 class="titolo">Scrivi il tuo messaggio</h2>
<div class="contenitore" style=" margin-bottom: 100px; width: 1000px;">
@if(Auth::user()->role == 'Locatario')
{{ Form::open(array('route' => 'addmessage', 'id' => 'nuovomess', 'class' => 'contact-form')) }}
@else
{{ Form::open(array('route' => 'addmessageLocatore', 'id' => 'nuovomess', 'class' => 'contact-form')) }}
@endif
<div class="form-row ">
<div class="form-group form">
{{ Form::label('Mittente', 'Mittente', ['class' => 'label-input']) }}
{{ Form::text('Mittente', $usernameLoggato, ['style' => 'margin-right: 12px; width: 90%;', 'class' => 'text_label', 'id' => 'Mittente' , 'required', 'readonly']) }}
@if ($errors->first('Mittente'))
<ul class="errors">
@foreach ($errors->get('Mittente') as $message)
<li>{{ $message }}</li>
@endforeach
</ul>
@endif
</div>
<div class="form-row ">
<div class="form-group form">
{{ Form::label('Destinatario', 'Destinatario', ['class' => 'label-input']) }}
{{ Form::text('Destinatario', $destinatario, ['style' => 'margin-right: 12px; width: 90%;','class' => 'text_label', 'id' => 'Destinatario' , 'required', 'readonly']) }}
@if ($errors->first('Destinatario'))
<ul class="errors">
@foreach ($errors->get('Destinatario') as $message)
<li>{{ $message }}</li>
@endforeach
</ul>
@endif
</div>
</div>
<div class="form-row ">
<div class="form-group form">
{{ Form::label('IdAlloggio', 'IdAlloggio', ['class' => 'label-input']) }}
{{ Form::number('IdAlloggio', $alloggio, ['style' => 'margin-right: 12px; width: 90%;','class' => 'text_label', 'id' => 'IdAlloggio' , 'required', 'readonly']) }}
@if ($errors->first('IdAlloggio'))
<ul class="errors">
@foreach ($errors->get('IdAlloggio') as $message)
<li>{{ $message }}</li>
@endforeach
</ul>
@endif
</div>
</div>
<div class="form-row ">
<div class="form-group form">
{{ Form::label('Data', 'Data', ['class' => 'label-input']) }}
{{ Form::text('Data', $data, ['style' => 'margin-right: 12px; width: 90%;','class' => 'text_label', 'id' => 'Data' , 'required', 'readonly']) }}
@if ($errors->first('Data'))
<ul class="errors">
@foreach ($errors->get('Data') as $message)
<li>{{ $message }}</li>
@endforeach
</ul>
@endif
</div>
</div>
<div class="form-row ">
<div class="form-group form">
{{ Form::label('Orario', 'Orario', ['class' => 'label-input']) }}
{{ Form::text('Orario', $orario, ['style' => 'margin-right: 12px; width: 90%;','class' => 'text_label', 'id' => 'Orario' , 'required','readonly']) }}
@if ($errors->first('Data'))
<ul class="errors">
@foreach ($errors->get('Orario') as $message)
<li>{{ $message }}</li>
@endforeach
</ul>
@endif
</div>
</div>
<div class="form-row ">
<div class="form-group form">
{{ Form::label('Contenuto', 'Contenuto', ['class' => 'label-input']) }}
{{ Form::textarea('Contenuto', '', ['class' => 'text_label', 'id' => 'Contenuto' , 'required']) }}
@if ($errors->first('Contenuto'))
<ul class="errors">
@foreach ($errors->get('Contenuto') as $message)
<li>{{ $message }}</li>
@endforeach
</ul>
@endif
</div>
</div>
<div class="wrap-input rs1-wrap-input titolo">
{{ Form::submit('Conferma', ['style' => 'background-color: #32aaee; border: 0px; color: white; padding-top: -2%;' , 'class' => 'btn btn-primary btn-lg']) }}
</div>
</div> @endsection
</body>
</html>

