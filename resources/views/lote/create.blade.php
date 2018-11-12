@extends('layouts.main')
@section('title', 'Fresh&Deli')
@section('content')
@component('layouts.menu')

@endcomponent
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Lote</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'lote','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre">Fecha</label>
            	<input type="text" name="date" class="form-control" placeholder="Fecha...">
            </div>
            <div class="form-group">
            	<label for="descripcion">Lote</label>
            	<input type="text" name="numero_lote" class="form-control" placeholder="Lote...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection