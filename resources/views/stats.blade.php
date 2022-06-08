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
  <body>

@section('content')
  <h2 class="titolo">Visualizzazione delle statistiche</h2>
 <div class="contenitore" style="margin-bottom: 100px;">
 {{ Form::open(array('route' => 'statsfind', 'class' => 'contact-form')) }}
  <div class="form-group">
                    {{ Form::label('Inizio', 'Dal', ['class' => 'form-label']) }}
                    {{ Form::date('Inizio','', ['class' => 'form-date'])}}
                    @if ($errors->first('Inizio'))
                        <ul class="errors">
                            @foreach ($errors->get('Inizio') as $message)
                            {{ $message }}</br>
                            @endforeach
                        </ul>
                    @endif
  </div>
  <div class="form-group">
                    {{ Form::label('Fine', 'Al', ['class' => 'form-label']) }}
                    {{ Form::date('Fine', '', ['class' => 'form-date']) }}
  </div>
  <hr>
 <div class="row mb-2 col-lg-12">
            <div class="col-lg-4">
                {{ Form::label('Appartamento', 'Appartamento', ['class' => 'form-label']) }}
                {{ Form::radio('Tipo', 'Appartamento', '', ['class' => 'form-radio']) }}
            </div>
             <div class="col-lg-4">
                {{ Form::label('Stanza singola', 'Stanza singola', ['class' => 'form-label']) }}
                {{ Form::radio('Tipo', 'Stanza singola', '', ['class' => 'form-radio']) }}
            </div>
            <div class="col-lg-4">
                {{ Form::label('Stanza doppia', 'Stanza doppia', ['class' => 'form-label']) }}
                {{ Form::radio('Tipo', 'Stanza doppia', '', ['class' => 'form-radio']) }}
            </div>
            <div class="col-lg-4">
                {{ Form::label('Tutti', 'Tutti i tipi', ['class' => 'form-label']) }}
                {{ Form::radio('Tipo', 'Tutti', '', ['class' => 'form-radio']) }}
            </div>
        </div>
        <div class="wrap-input  rs1-wrap-input titolo">
            {{ Form::submit('Cerca', ['style' => 'background-color: #32aaee; border: 0px; color: white; padding-top: -2%;' , 'class' => 'btn btn-primary btn-lg']) }}
            {{ Form::close() }}
        </div>
</form>
@endsection
