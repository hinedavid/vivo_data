@extends('layouts.main')
@section('title', 'Bienvenido a Fresh&Deli')
@section('content')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          @if (Route::has('login'))
            @auth
              <a class="nav-link" href="{{ url('/home') }}">Panel administrativo <span class="sr-only">(current)</span> </a>
            @else
              <a class="nav-link" href="{{ route('login') }}">Autenticarse <span class="sr-only">(current)</span> </a>
            @endauth
          @endif
        </li>
      </ul>
    </div>
  </div>
</nav>
<header>

    @if (Route::has('login'))
        @auth
            <a href="{{ url('/home') }}">Panel administrativo</a>
        @else
            <a href="{{ route('login') }}">Autenticarse</a>
        @endauth
    @endif

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('http://placehold.it/1900x1080')">
        <div class="carousel-caption d-none d-md-block">
          <h3>Primera Slide</h3>
          <p>Una pequeña introducción.</p>
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
        <div class="carousel-caption d-none d-md-block">
          <h3>Segunda Slide</h3>
          <p>Una pequeña introducción.</p>
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
        <div class="carousel-caption d-none d-md-block">
          <h3>Tercera Slide</h3>
          <p>Una pequeña introducción.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Siguiente</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Anterior</span>
    </a>
  </div>
</header>
@endsection