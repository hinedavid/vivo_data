@extends('layouts.main')
@section('title', 'Fresh&Deli')
@section('menu')
@component('layouts.menu')
@endcomponent
@endsection
@section('content')
<div class="main-content">
  <div class="container">
    <div class="img-center">
       <img id="img-center" src="{{ asset('img')}}/blob.png" style="height:65%" class="img-fluid" alt="Responsive image">
    </div>
  </div>
</div>
@endsection