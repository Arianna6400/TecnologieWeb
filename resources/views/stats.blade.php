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
  <div class="form-group">
                    {{ Form::label('Start_stats', 'Dal', ['class' => 'form-label']) }}
                    {{ Form::date('Start_stats','', ['class' => 'form-date-stats'])}}
                    @if ($errors->first('Start_stats'))
                        <ul class="errors">
                            @foreach ($errors->get('Start_stats') as $message)
                            {{ $message }}</br>
                            @endforeach
                        </ul>
                    @endif
  </div>
  <div class="form-group">
                    {{ Form::label('End_stats', 'Al', ['class' => 'form-label']) }}
                    {{ Form::date('End_stats', '', ['class' => 'form-date-stats']) }}
                    @if ($errors->first('End_stats'))
                        <ul class="errors">
                            @foreach ($errors->get('end_stats') as $message)
                            {{ $message }}</br>
                            @endforeach
                        </ul>
                    @endif
  </div>
 <div class="row mb-2 col-lg-12">
            <div class="col-lg-4">
                {{ Form::label('Appartamento', 'Appartamento', ['class' => 'form-label']) }}
                {{ Form::radio('Tipo', '', ['class' => 'form-radio-stats']) }}
            </div>
             <div class="col-lg-4">
                {{ Form::label('Posto Singolo', 'Posto Singolo', ['class' => 'form-label']) }}
                {{ Form::radio('Tipo', '', ['class' => 'form-radio-stats']) }}
            </div>
            <div class="col-lg-4">
                {{ Form::label('Posto Doppio', 'Posto Doppio', ['class' => 'form-label']) }}
                {{ Form::radio('Tipo', '', ['class' => 'form-radio-stats']) }}
            </div>
            <div class="col-lg-4">
                {{ Form::label('Tutti', 'Tutti i tipi', ['class' => 'form-label']) }}
                {{ Form::radio('Tipo', '', ['class' => 'form-radio-stats']) }}
            </div>
            @if ($errors->first('tipo'))
                    <ul class="errors">
                        @foreach ($errors->get('tipo') as $message)
                        {{ $message }}</br>
                        @endforeach
                    </ul>
            @endif
        </div>
        <div class="wrap-input  rs1-wrap-input titolo">
            {{ Form::submit('Cerca', ['style' => 'background-color: #32aaee; border: 0px; color: white; padding-top: -2%;' , 'class' => 'btn btn-primary btn-lg']) }}
            {{ Form::close() }}
        </div>
</form>
@endsection
