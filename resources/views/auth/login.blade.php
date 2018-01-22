@extends('auth.layout')

@section('content')
    <h4 class="auth-header">Login</h4>
    {!! Form::open(['url' => url('login')]) !!}

    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
        {!! Form::label('email', 'Email') !!}
        {!! Form::text('email', old('email'), ['class' => 'form-control' , 'placeholder' => 'Enter Email']) !!}
        <div class="pre-icon os-icon os-icon-email-2-at2"></div>

        @if($errors->first('email'))
            <p>{{ $errors->first() }}</p>
            <p><a href="{{ url('register') }}">Register If Not Have Account</a></p>
        @endif
    </div>
    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
        <div class="pre-icon os-icon os-icon-fingerprint"></div>
        @if($errors->first('password'))
            <p>{{ $errors->first() }}</p>
        @endif
    </div>
    <div class="buttons-w">
        <button class="btn btn-primary" type="submit">Login</button>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                Remember Me
            </label>
            <label class="form-check-label">
                Or <a href="{{ url('register') }}">Register</a>
            </label>

        </div>
    </div>

    {!! Form::close() !!}

@endsection
