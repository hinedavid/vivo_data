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
  							<label for="lote"> Proveedor: {{$lote[0]}}</label>
  							
  								
  							
  						</div>
  						<div class="form-group col-12">
  	          	<label for="proveedor"> Producto: {{$lote[1]}}</label>
  	          </div>
  						<div class="form-group col-12">
  							<label for="proveedor"> ID Lote:   {{$lote[2]}}</label>
  							
  						</div>
  						<div class="form-group col-12 ">
  	          	<label for="proveedor"> Fecha: {{$lote[3]}}</label>
  	          </div>
            </div>
              <?php
									$textoqr = "Proveedor: ".$lote[0]."\n"."Producto: ".$lote[1]. "\n". "ID Lote: ".$lote[2]. "\n"."Fecha: ".$lote[3] ;
 										 ?>
              <div class=" text-left col-lg-6 col-md-6 col-sm-6 col-xs-12">
  						<div class="form-group col-12">
                    {!! QrCode::size(100)->generate($textoqr); !!}
    							
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
