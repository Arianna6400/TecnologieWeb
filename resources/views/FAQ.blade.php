@extends('layouts.public')

@section('title', 'Home')

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
 <div class="intro" style="background-image: url(images/imagewall.jpg);"></div>
  <h1 class="textfaq">Frequently Asked Questions </h1>
  <div class="accordion faq" id="accordionExample">
  @isset($faq)
   @foreach($faq as $faqsing)
    <div class="card ">
      <div class="card-header" id="heading{{ $faqsing->ID}}">
        <h2 class="mb-0">
          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $faqsing->ID}}" aria-expanded="true" aria-controls="collapse{{ $faqsing->ID}}">
          <h4> Q: {{ $faqsing->Domanda}} </h4> 
          </button>
          @auth
            @if(auth()->user()->role == 'Admin')
            <a type="submit" href="{{route('modfaq', ['id' => $faqsing->ID])}}"><img style="height: 20px; width:20px; border-radius: 100px;" src="images/modifica.jpg"></a>
            @endif
          @endauth
        </h2>
       </div>
       <div id="collapse{{ $faqsing->ID}}" class="collapse" aria-labelledby="heading{{ $faqsing->ID}}" data-parent="#accordionExample">
         <div class="card-body">
         <h4> A: {{ $faqsing->Risposta}}  </h4>
         </div>
       </div>
     </div>
   @endforeach
   <br>
   <br>
   @auth
     @if(auth()->user()->role == 'Admin')
      <a class="btn btn-outline-primary" type="submit" href="{{route('insertfaq')}}">Inserisci nuova FAQ</a>
     @endif
   @endauth
  @endisset
</div>
  @endsection
    

</html>
