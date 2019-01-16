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
  							<label for="lote"> ID Proveedor : {{$lote[4]}}</label>
  							
  								
  							
  						</div>
              
              
              
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
  	          <div class="form-group col-12 ">
  	          	<label for="proveedor"> Recibe: {{}}</label>
  	          </div>
            </div>
              <?php
									$textoqr = "ID Proveedor: ".$lote[4]."\n"."Proveedor: ".$lote[0]."\n"."Producto: ".$lote[1]. "\n". "ID Lote: ".$lote[2]. "\n"."Fecha: ".$lote[3] ;
 										 ?>
              <div class=" text-left col-lg-6 col-md-6 col-sm-6 col-xs-12">
  						<div class="form-group col-12">
                    {!! QrCode::size(100)->generate($textoqr); !!}
    							
  						</div>
  					</div>

					</div>
          <div class="row">
            <div class="mx-auto" style="width:60%;">
    					<button class="btn fd-button btnPrint  col-lg-6 col-md-6 col-sm-12 col-xs-12" href='/registeredpdf/20' type="submit">Imprimir</button>
    					<a href="{{ route('home') }}"><button class="btn fd-button col-lg-6 col-md-6 col-sm-12 col-xs-12" type="reset">Cancelar</button></a>
    				</div>
          </div>


		</div>
	</div>
@endsection

@section('extrajsfile')
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap-datepicker.es.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.printPage.js') }}" type="text/javascript"></script>
@endsection

@section('extrajscode')
<script type="text/javascript">
 $(document).ready(function() {
    $(".btnPrint").printPage();
  });
</script>
@endsection
