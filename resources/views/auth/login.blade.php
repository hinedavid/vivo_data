@extends('layouts.main')
@section('title', 'Inicio sesión')
@section('content')
<div class="container h-100">
  <div class="row h-100 justify-content-center align-items-center">
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="form-group row justify-content-center">
        <input id="email" type="email" placeholder="Usuario" class="Login-input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
          @if ($errors->has('email'))
            <span class="alerta invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
      </div>
      <div class="form-group row justify-content-center">
        <input id="password" type="password" placeholder="Password"  class="Login-input form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
      </div>
      <div class="form-group row justify-content-center">
          <button type="submit" class="Login-button"> Ingresar </button>
      </div>
      <!--
      <div class="form-group row justify-content-center">
          <a class="Login-text" href="{{ route('password.request') }}"> Olvidé mi password</a>
      </div>
      -->
    </form>
  </div>
</div>
@endsection