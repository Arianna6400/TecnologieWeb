@extends('layouts.public')

@section('title', 'Registrazione')

@section('content')


<div class="form-login">
    <h3>Registrazione</h3>
    <p>Utilizza questa form per registrarti al sito</p>

    <div class="container-contact">
        <div class="wrap-contact1">
            {{ Form::open(array('route' => 'confermaregistrazione', 'class' => 'contact-form')) }}

            <div  class="wrap-input">
                {{ Form::label('Nome', 'Nome', ['class' => 'label-input']) }}
                {{ Form::text('Nome', '', ['class' => 'input', 'id' => 'Nome']) }}
                @if ($errors->first('Nome'))
                <ul class="errors">
                    @foreach ($errors->get('Nome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div  class="wrap-input">
                {{ Form::label('Cognome', 'Cognome', ['class' => 'label-input']) }}
                {{ Form::text('Cognome', '', ['class' => 'input', 'id' => 'Cognome']) }}
                @if ($errors->first('Cognome'))
                <ul class="errors">
                    @foreach ($errors->get('Cognome') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
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

            <div class="wrap-input">
                {{ Form::label('Sesso', 'Sesso', ['class' => 'label-input'])}}
                {{ Form::select('Sesso', ['M' => 'Maschio', 'F' => 'Femmina'], '', ['class' => 'input','id' => 'Sesso']) }}
            </div>

            <div class="wrap-input ">
                {{ Form::label('DataNascita', 'Data di nascita', ['class' => 'label-input']) }}
                {{ Form::date('DataNascita', '', ['class' => 'input', 'id' => 'DataNascita', 'required']) }}
                @if ($errors->first('DataNascita'))
                <ul class="errors">
                    @foreach ($errors->get('DataNascita') as $message)
                    <li>{{ $message }}</li>
                      @endforeach
                </ul>
                @endif
             </div>

             <div class="wrap-input">
                {{ Form::label('Tipo', 'Tipo', ['class' => 'label-input'])}}
                {{ Form::select('role', ['Locatore' => 'Locatore', 'Locatario' => 'Locatario'], '', ['class' => 'input','id' => 'Tipo']) }}
            </div>
            
             <div  class="wrap-input">
                {{ Form::label('Password', 'Password', ['class' => 'label-input']) }}
                {{ Form::password('password', ['class' => 'input', 'id' => 'Password']) }}
                @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div  class="wrap-input">
                {{ Form::label('Password-confirm', 'Conferma password', ['class' => 'label-input']) }}
                {{ Form::password('password_confirmation', ['class' => 'input', 'id' => 'password-confirm']) }}
            </div>
            
            <div class="container-form-btn">                
                {{ Form::submit('Registra', ['class' => 'form-btn1']) }}
            </div>
            
            {{ Form::close() }}
        </div>
    </div>

</div>

@endsection
