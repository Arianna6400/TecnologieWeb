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
<img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 70px; height: 70px; margin-left: 80%;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACqUlEQVR4Xu2Y60tiURTFl48STFJMwkQjUTDtixq+Av93P6iBJFTgg1JL8QWBGT4QfDX7gDIyNE3nEBO6D0Rh9+5z9rprr19dTa/XW2KHl4YFYAfwCHAG7HAGgkOQKcAUYAowBZgCO6wAY5AxyBhkDDIGdxgC/M8QY5AxyBhkDDIGGYM7rIAyBgeDAYrFIkajEYxGIwKBAA4PDzckpd+322243W54PJ5P5f6Omh9tqiTAfD5HNpuFVqvFyckJms0m9vf3EY/H1/u9vb0hn89jsVj8kwDfUfNviisJ8PLygru7O4TDYVgsFtDh9Xo9NBrNes9cLgeTybThgKenJ1SrVXGf1WoVDup2u4jFYhiPx1I1P7XVBxcoCVCr1UBfTqcTrVYLe3t7OD8/x/HxsdiOPqNGo9Eo0un02gHkBhJmuVzC7/fj5uYGXq8XZ2dnop5Mzf8iwMPDAxqNBmw2GxwOBx4fHzGdTpFMJkVzNB7UGAmSSqU2RoDmnETQ6XQiOyKRiHCOSk0ZEZQcUKlU8Pz8LA5vNptRr9eFCJQBFHq//szG5eWlGA1ywOnpqQhBapoWPfl+vw+fzweXyyU+U635VRGUBOh0OigUCggGg8IFK/teXV3h/v4ew+Hwj/OQU4gUq/w4ODgQrkkkEmKEVGp+tXm6XkkAOngmk4HBYBAjQA6gEKRmyOL05GnR99vbW9jtdjEGdP319bUIR8oA+pnG5OLiQoghU5OElFlKAtCGr6+vKJfLmEwm64aosd/XbDbbyIBSqSSeNKU+HXzlnFAohKOjI6maMs0rO0B20590n7IDflIzMmdhAfiNEL8R4jdC/EZIJj235R6mAFOAKcAUYApsS6LL9MEUYAowBZgCTAGZ9NyWe5gCTAGmAFOAKbAtiS7TB1Ng1ynwDkxRe58vH3FfAAAAAElFTkSuQmCC">
</a><br><br><br>

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
<img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 70px; height: 70px; margin-left: 80%;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACqUlEQVR4Xu2Y60tiURTFl48STFJMwkQjUTDtixq+Av93P6iBJFTgg1JL8QWBGT4QfDX7gDIyNE3nEBO6D0Rh9+5z9rprr19dTa/XW2KHl4YFYAfwCHAG7HAGgkOQKcAUYAowBZgCO6wAY5AxyBhkDDIGdxgC/M8QY5AxyBhkDDIGGYM7rIAyBgeDAYrFIkajEYxGIwKBAA4PDzckpd+322243W54PJ5P5f6Omh9tqiTAfD5HNpuFVqvFyckJms0m9vf3EY/H1/u9vb0hn89jsVj8kwDfUfNviisJ8PLygru7O4TDYVgsFtDh9Xo9NBrNes9cLgeTybThgKenJ1SrVXGf1WoVDup2u4jFYhiPx1I1P7XVBxcoCVCr1UBfTqcTrVYLe3t7OD8/x/HxsdiOPqNGo9Eo0un02gHkBhJmuVzC7/fj5uYGXq8XZ2dnop5Mzf8iwMPDAxqNBmw2GxwOBx4fHzGdTpFMJkVzNB7UGAmSSqU2RoDmnETQ6XQiOyKRiHCOSk0ZEZQcUKlU8Pz8LA5vNptRr9eFCJQBFHq//szG5eWlGA1ywOnpqQhBapoWPfl+vw+fzweXyyU+U635VRGUBOh0OigUCggGg8IFK/teXV3h/v4ew+Hwj/OQU4gUq/w4ODgQrkkkEmKEVGp+tXm6XkkAOngmk4HBYBAjQA6gEKRmyOL05GnR99vbW9jtdjEGdP319bUIR8oA+pnG5OLiQoghU5OElFlKAtCGr6+vKJfLmEwm64aosd/XbDbbyIBSqSSeNKU+HXzlnFAohKOjI6maMs0rO0B20590n7IDflIzMmdhAfiNEL8R4jdC/EZIJj235R6mAFOAKcAUYApsS6LL9MEUYAowBZgCTAGZ9NyWe5gCTAGmAFOAKbAtiS7TB1Ng1ynwDkxRe58vH3FfAAAAAElFTkSuQmCC">
</a><br><br><br>

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
