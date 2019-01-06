@extends('layouts.main')
@section('title', 'Reportes')
@section('menu')
@component('layouts.menu')
@endcomponent
@endsection
@section('content')
	<div class="main-content">
		<div class="container">
			<div class="row">
				<div class="text-center col-lg-12 col-md-6 col-sm-12 col-xs-12">
					<h3>Reportes de entregas</h3>
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
			</div>
		<!--	{!!Form::open(array('url'=>'lote','method'=>'POST','autocomplete'=>'off'))!!}
	        {{Form::token()}} -->
					<div class="row">

						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<label for="proveedor"></label>
							<select name="proveedor" class="form-control fd-input">
								<option value="" disabled selected>Proveedor</option>
							  <option value="100">100</option>
							  <option value="101">101</option>
							  <option value="101">101</option>
							  <option value="101">101</option>
							</select>
						</div>

						<div class="form-group col-lg-4 col-md-2 col-sm-6 col-xs-12">
							<label for="producto"></label>
							<select name="producto" class="form-control fd-input">
								<option value="" disabled selected>Producto</option>
							  <option value="100">100</option>
							  <option value="101">101</option>
							  <option value="101">101</option>
							  <option value="101">101</option>
							</select>
						</div>

						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<div class="item1">
								<label for="lote"></label>
		          	<input type="text" name="lote" class="form-control fd-input" placeholder="Número de lote">
							</div>
							<br><br>
							<div class="item2">
								<a href="{{ url('/consultreport') }}"><button class="btn fd-button col-sm-12 col-xs-12" >Consultar</button></a>
							</div>
	          </div>

					</div>
			<!--	{!!Form::close()!!} -->
		</div>
	</div>
@endsection
