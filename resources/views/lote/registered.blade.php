@extends('layouts.main')
@section('title', 'Registro de lote')
@section('menu')
@component('layouts.menu')
@endcomponent
@endsection
@section('content')
	<div class="main-content">
		<div class="container">
			<div class="row">
				<div class="text-left col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<h3>Registro</h3>
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

					<div class=" text-right row col-12">
            <div class="text-right col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="form-group col-12">
  							<label for="proveedor"> Provedor:</label>
  						</div>
  						<div class="form-group col-12">
  	          	<label for="proveedor"> Producto:</label>
  	          </div>
  						<div class="form-group col-12">
  							<label for="proveedor"> ID Lote:</label>
  						</div>
  						<div class="form-group col-12 ">
  	          	<<label for="proveedor"> Provedor:</label>
  	          </div>
            </div>
            <div class=" text-left col-lg-6 col-md-6 col-sm-6 col-xs-12">
  						<div class="form-group col-12">
                /*Acá va el QR*/
  						</div>
  					</div>

					</div>
          <div class="row">
            <div class="mx-auto" style="width:60%;">
    					<a href="#"><button class="btn fd-button col-lg-6 col-md-6 col-sm-12 col-xs-12" type="submit">Imprimir</button></a>
    					<a href="{{ route('home') }}"><button class="btn fd-button col-lg-6 col-md-6 col-sm-12 col-xs-12" type="reset">Cancelar</button></a>
    				</div>
          </div>


		</div>
	</div>
@endsection
