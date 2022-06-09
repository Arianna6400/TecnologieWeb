@extends('layouts.public')



@section('title', 'Chat')



<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">




<link rel="stylesheet" href="{{asset('css/stile.css')}}">
<link rel="stylesheet" href="css/font-awesome.css">
<!------ Include the above in your HEAD tag ---------->
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
</head>



@section('content')

@isset($messaggi_dest)
<div class="contenitore" style="margin-top:3%;">
<h5 style="text-align: left; margin-bottom: 3%;">Messaggi inviati a <b>{{Auth::user()->Username}}</b>:</h5>
@foreach($messaggi_dest as $messaggio1)
<div class="row" style="align-content: center;">
<div class="conversation-wrap col-lg-3">
<div class="media conversation">
<div class="media-body">
<br>
<a class="pull-left" href="#">
</a>

<small>Alloggio: <b>{{$messaggio1->IdAlloggio}}</b></small><br>
<small>Mittente: <b>{{$messaggio1->Mittente}}</b></small><br>
<small>Data: <b>{{$messaggio1->Data}}</b></small><br>
<small>Ora: <b>{{$messaggio1->Orario}}</b></small><br>
</div>
</div>
</div>
<div class="message-wrap col-lg-8">
<div class="msg-wrap">
<div class="media msg ">
<div class="media-body">
<div class="contenitore" style=" word-wrap: break-word; width: 600px; height: auto; text-align: left; background-color: rgba(255,255,255,0.8)">

{!! $messaggio1->Contenuto !!}

</div>
@if($messaggio1->Mittente != Auth::user()->Username)
@if(Auth::user()->role == 'Locatario')
<form action="{{route('nuovomessaggio', [$messaggio1->ID, $messaggio1->IdAlloggio])}}">
<button class="btn btn-outline-success mr-sm-2" type="submit" style=" background-color: orange; border: 0px; color: white; padding-top: -2%; margin-top: 5%;">Rispondi</button>
</form>
@else
<form action="{{route('nuovomessaggioLocatore', [$messaggio1->ID, $messaggio1->IdAlloggio])}}">
<button class="btn btn-outline-success mr-sm-2" type="submit" style=" background-color: #32aaee; border: 0px; color: white; padding-top: -2%; margin-top: 5%;">Rispondi</button>
</form>
@endif
@endif
</div>

</div>
</div>
</div>
</div>
<br>
<hr class="linea" style=" border: 2px solid #32aaee; width: 100%;">
@endforeach
</div>
@endisset

@isset($messaggi_mitt)
<div class="contenitore" style="margin-top:3%; margin-bottom: 10%;">
<h5 style="text-align: left; margin-bottom: 3%;">Messaggi inviati da <b>{{Auth::user()->Username}}</b>:</h5>
@foreach($messaggi_mitt as $messaggio2)
<div class="row">
<div class="conversation-wrap col-lg-3">
<div class="media conversation">
<div class="media-body">
<br>
<a class="pull-left" href="#">
</a>

<small>Alloggio: <b>{{$messaggio2->IdAlloggio}}</b></small><br>
<small>Destinatario: <b>{{$messaggio2->Destinatario}}</b></small><br>
<small>Data: <b>{{$messaggio2->Data}}</b></small><br>
<small>Ora: <b>{{$messaggio2->Orario}}</b></small><br>
</div>
</div>
</div>
<div class="message-wrap col-lg-8">
<div class="msg-wrap">
<div class="media msg ">
<div class="media-body">
<div class="contenitore" style=" word-wrap: break-word; width: 600px; height: auto; text-align: left; background-color: rgba(255,255,255,0.8)">

{!! $messaggio2->Contenuto !!}

</div>
@if($messaggio2->Mittente != Auth::user()->Username)
@if(Auth::user()->role == 'Locatario')
<form action="{{route('nuovomessaggio', [$messaggio2->ID, $messaggio1->IdAlloggio])}}">
<button class="btn btn-outline-success mr-sm-2" type="submit" style=" background-color: orange; border: 0px; color: white; padding-top: -2%; margin-top: 5%;">Rispondi</button>
</form>
@else
<form action="{{route('nuovomessaggioLocatore', [$messaggio2->ID, $messaggio1->IdAlloggio])}}">
<button class="btn btn-outline-success mr-sm-2" type="submit" style=" background-color: #32aaee; border: 0px; color: white; padding-top: -2%; margin-top: 5%;">Rispondi</button>
</form>
@endif
@endif
</div>
</div>
</div>
</div>
</div>
<br>
<hr class="linea" style=" border: 2px solid #32aaee; width: 100%;">
@endforeach
</div>

@endisset

@endsection



</html>
