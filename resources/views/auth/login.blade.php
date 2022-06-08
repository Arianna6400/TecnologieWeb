@extends('layouts.public')

@section('title', 'Login')

@section('content')
<link rel="stylesheet" href="{{asset('css/stile.css')}}">
<div class="introwho3">
  </div>
<div>
    <div class="contenitore" style=" height: 490px; margin-top: 10%; margin-bottom: 10%; text-align: center;">
    <h3>Login</h3>
    <p>Utilizza questa form per autenticarti al sito</p>

    <div class="contenitore">
        <div class="wrap-contact1">
            {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}
            
             <div  class="wrap-input">
                 <p> Se non hai già un account <a  href="{{ route('register') }}">registrati</a></p>
             </div>            
             <div  class="wrap-input">
                {{ Form::label('Username', 'Nome Utente', ['class' => 'label-input']) }}
                {{ Form::text('Username', '', ['class' => 'text_label','id' => 'Username']) }}
                @if ($errors->first('Username'))
                <ul class="errors">
                    @foreach ($errors->get('Username') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
             <div  class="wrap-input">
                {{ Form::label('Password', 'Password', ['class' => 'label-input']) }}
                {{ Form::password('password', ['class' => 'text_label', 'id' => 'password']) }}
                @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
            <div class="container-form-btn">                
                {{ Form::submit('Login', ['style' => 'background-color: red; margin-top: 3%; border: 0px; color:white;' ,'class' => 'btn btn-outline-success mr-sm-2']) }}
            </div>
            
            {{ Form::close() }}
        </div>
    </div>

</div>
</div>

@endsection
