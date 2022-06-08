@extends('layouts.public')

@section('title', 'Chat')

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="css/font-awesome.css">
<!------ Include the above in your HEAD tag ---------->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
</head>
    <body>
        @section('content')
            <div class="container" style="margin-top:10px;">
                @isset($messaggi)
                    @foreach($messaggi as $messaggio)
                        <div class="row">
                            <div class="conversation-wrap col-lg-3">
                                <div class="media conversation">
                                       <i class="fa fa-user fa-3x"></i>
                                       @if($messaggio->Destinatario == Auth::user()->Username)
                                            <h5 class="media-heading">{{$messaggio->Mittente}}</h5>
                                       @else
                                            <h5 class="media-heading">{{$messaggio->Destinatario}}</h5>
                                       @endif
                                    <div class="media-body">
                                        <i class="fa fa-home fa-3x"></i>
                                        <small>Alloggio: {{$messaggio->IdAlloggio}}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="message-wrap col-lg-8">
                                <div class="msg-wrap">
                                    <div class="alert alert-info msg-date">
                                        <strong>{{$messaggio->Data}}</strong>
                                    </div>
                                    <div class="media msg ">
                                        <a class="pull-left" href="#">
                                            <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 32px; height: 32px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACqUlEQVR4Xu2Y60tiURTFl48STFJMwkQjUTDtixq+Av93P6iBJFTgg1JL8QWBGT4QfDX7gDIyNE3nEBO6D0Rh9+5z9rprr19dTa/XW2KHl4YFYAfwCHAG7HAGgkOQKcAUYAowBZgCO6wAY5AxyBhkDDIGdxgC/M8QY5AxyBhkDDIGGYM7rIAyBgeDAYrFIkajEYxGIwKBAA4PDzckpd+322243W54PJ5P5f6Omh9tqiTAfD5HNpuFVqvFyckJms0m9vf3EY/H1/u9vb0hn89jsVj8kwDfUfNviisJ8PLygru7O4TDYVgsFtDh9Xo9NBrNes9cLgeTybThgKenJ1SrVXGf1WoVDup2u4jFYhiPx1I1P7XVBxcoCVCr1UBfTqcTrVYLe3t7OD8/x/HxsdiOPqNGo9Eo0un02gHkBhJmuVzC7/fj5uYGXq8XZ2dnop5Mzf8iwMPDAxqNBmw2GxwOBx4fHzGdTpFMJkVzNB7UGAmSSqU2RoDmnETQ6XQiOyKRiHCOSk0ZEZQcUKlU8Pz8LA5vNptRr9eFCJQBFHq//szG5eWlGA1ywOnpqQhBapoWPfl+vw+fzweXyyU+U635VRGUBOh0OigUCggGg8IFK/teXV3h/v4ew+Hwj/OQU4gUq/w4ODgQrkkkEmKEVGp+tXm6XkkAOngmk4HBYBAjQA6gEKRmyOL05GnR99vbW9jtdjEGdP319bUIR8oA+pnG5OLiQoghU5OElFlKAtCGr6+vKJfLmEwm64aosd/XbDbbyIBSqSSeNKU+HXzlnFAohKOjI6maMs0rO0B20590n7IDflIzMmdhAfiNEL8R4jdC/EZIJj235R6mAFOAKcAUYApsS6LL9MEUYAowBZgCTAGZ9NyWe5gCTAGmAFOAKbAtiS7TB1Ng1ynwDkxRe58vH3FfAAAAAElFTkSuQmCC">
                                        </a>
                                        <div class="media-body">
                                            <small class="pull-right time"><i class="fa fa-clock-o"></i> {{$messaggio->Orario}}</small>
                                            <h5 class="media-heading"><b>{{$messaggio->Mittente}}</b> scrive a <b>{{$messaggio->Destinatario}}</b></h5>
                                            <small class="col-lg-10">{!! $messaggio->Contenuto !!}</small>
                                            @if($messaggio->Mittente != Auth::user()->Username)
                                                @if(Auth::user()->role == 'Locatario')
                                                    <a href="{{route('nuovomessaggio', [$messaggio->ID, $messaggio->IdAlloggio])}}">Rispondi</a>
                                                @else
                                                    <a href="{{route('nuovomessaggioLocatore', [$messaggio->ID, $messaggio->IdAlloggio])}}">Rispondi</a>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
        @endsection
</body>
</html>