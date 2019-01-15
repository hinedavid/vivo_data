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
		{!!Form::open(array('route'=>'lote.reportsdetails','method'=>'POST','autocomplete'=>'off'))!!}
	       
					<div class="row">

								<div class="form-group col-lg-4 col-md-2 col-sm-6 col-xs-12">
									<label for="proveedor"> </label>
									<select class=" form-control fd-control fd-input dynamic-provider" name="proveedor" id="proveedor">
										<option value="" disabled selected>Proveedor</option>
										@if (count($proveedores)>0)
											@foreach($proveedores as $item)
												<option value="{{$item->idproveedor}}">{{$item->nombre}}</option>
											@endforeach
										@endif
									</select>
								</div>

								

						<div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<div class="item1">
								<label for="lote"></label>
		          	<input type="text" name="lote" class="form-control fd-input" placeholder="Número de lote">
							</div>
							<br><br>
							<div class="item2">
								<button class="btn fd-button col-sm-12 col-xs-12" type="submit" >Consultar</button>
							</div>
	          </div>

					</div>
			<!--	{!!Form::close()!!} -->
		</div>
	</div>
@endsection

@section('extrajsfile')
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap-datepicker.es.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/datepicker.js') }}" type="text/javascript"></script>
@endsection


