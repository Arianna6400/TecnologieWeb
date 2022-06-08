@extends('layouts.public')

@section('title', 'Login')

@section('content')
<div class="form-login">
    <h3>Login</h3>
    <p>Utilizza questa form per autenticarti al sito</p>

    <div class="container-contact">
        <div class="wrap-contact1">
            {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}
            
             <div  class="wrap-input">
                 <p> Se non hai già un account <a  href="{{ route('register') }}">registrati</a></p>
             </div>            
             <div  class="wrap-input">
                {{ Form::label('Username', 'Nome Utente', ['class' => 'label-input']) }}
                {{ Form::text('Username', '', ['class' => 'input','id' => 'Username']) }}
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
                {{ Form::password('password', ['class' => 'input', 'id' => 'password']) }}
                @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            
            <div class="container-form-btn">                
                {{ Form::submit('Login', ['class' => 'form-btn1']) }}
            </div>
            
            {{ Form::close() }}
        </div>
    </div>

</div>


@endsection
