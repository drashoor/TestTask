@extends('auth.layout')

@section('content')

    <h4 class="auth-header">Create new account</h4>
    {!! Form::open(['url' => url('register')]) !!}

    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
        {!! Form::label('name', 'Username') !!}
        {!! Form::text('name', old('name'), ['class' => 'form-control' , 'placeholder' => 'Enter Email']) !!}
        <div class="pre-icon os-icon os-icon-user"></div>
        @if($errors->first('name'))
            <p>{{ $errors->first('name') }}</p>
        @endif
    </div>
    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
        {!! Form::label('email', 'Email') !!}
        {!! Form::text('email', old('email'), ['class' => 'form-control' , 'placeholder' => 'Enter Email']) !!}
        <div class="pre-icon os-icon os-icon-email-2-at2"></div>
        @if($errors->first('email'))
            <p>{{ $errors->first('email') }}</p>
        @endif
    </div>
    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
        <div class="pre-icon os-icon os-icon-fingerprint"></div>
        @if($errors->first('password'))
            <p>{{ $errors->first('password') }}</p>
        @endif
    </div>
    <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        {!! Form::label('password_confirmation', 'Password Confirmation') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        <div class="pre-icon os-icon os-icon-fingerprint"></div>
        @if($errors->first('password_confirmation'))
            <p>{{ $errors->first('password_confirmation') }}</p>
        @endif
    </div>
    <div class="buttons-w">
        <button class="btn btn-primary" type="submit">Register</button>
    </div>

    {!! Form::close() !!}
@endsection
