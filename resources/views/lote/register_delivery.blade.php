@extends('layouts.main')
@section('title', 'Registro de entrega')
@section('extracss')
<link href="{{ asset('css/bootstrap-datepicker.standalone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('menu')
@component('layouts.menu')
@endcomponent
@endsection
@section('content')
	<div class="main-content">
		<div class="container">
			<div class="row">
				<div class="text-left col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<h3>Registro de lote</h3>
					@if (count($errors)>0)
					<div class="alert alert-danger">
						<ul>
						@foreach ($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
						</ul>
					</div>
					@endif
				</div>
				<div class="text-right col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<a href="{{ route('home') }}"><button class="btn fd-button col-sm-12 col-xs-12" type="submit">Guardar</button></a>
					<a href="{{ route('home') }}"><button class="btn fd-button col-sm-12 col-xs-12" type="reset">Cancelar</button></a>
				</div>
			</div>
			{!!Form::open(array('url'=>'lote','method'=>'POST','autocomplete'=>'off'))!!}
	        {{Form::token()}}
					<div class="row">
						<div class="form-group col-lg-2 col-md-4 col-sm-6 col-xs-12">
							<label for="receta"></label>
							<select name="receta" class="form-control fd-input">
								<option value="" disabled selected>Receta</option>
							  <option value="100">100</option>
							  <option value="101">101</option>
							  <option value="101">101</option>
							  <option value="101">101</option>
							</select>
						</div>

						<div class="form-group col-lg-2 col-md-4 col-sm-6 col-xs-12">
							<label for="proveedor"></label>
							<select name="proveedor" class="form-control fd-input">
								<option value="" disabled selected>Proveedor</option>
							  <option value="100">100</option>
							  <option value="101">101</option>
							  <option value="101">101</option>
							  <option value="101">101</option>
							</select>
						</div>

						<div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
							<label for="lote"></label>
							<select name="lote" class="form-control fd-input">
								<option value="" disabled selected>Lote</option>
							  <option value="100">100</option>
							  <option value="101">101</option>
							  <option value="101">101</option>
							  <option value="101">101</option>
							</select>
						</div>

						<div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
							<label for="producto"></label>
							<select name="producto" class="form-control fd-input">
								<option value="" disabled selected>Producto</option>
							  <option value="100">100</option>
							  <option value="101">101</option>
							  <option value="101">101</option>
							  <option value="101">101</option>
							</select>
						</div>

						<div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">

							<div class="item1">
								<label for="cantidad"> </label>
								<input type="text" name="cantidad" class="form-control fd-input" placeholder="Unidades">
							</div>

							<div class="item2">
								<label for="descripcion"> </label>
								<input type="text" name="numero_lote" class="form-control fd-input" placeholder="KG">
							</div>

							<div class="item3">
								<label for="recibe"></label>
								<select name="recibe" class="form-control fd-input">
									<option value="" disabled selected>Recibe</option>
								  <option value="100">100</option>
								  <option value="101">101</option>
								  <option value="101">101</option>
								  <option value="101">101</option>
								</select>
							</div>
						</div>

						<div class="form-group col-lg-2 col-md-4 col-sm-6 col-xs-12">
								<label for="date"> </label>
								<div class="input-group date df-datepicker"></div>
						</div>

					</div>
				{!!Form::close()!!}
		</div>
	</div>
@endsection
@section('extrajsfile')
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap-datepicker.es.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/datepicker.js') }}" type="text/javascript"></script>
@endsection
