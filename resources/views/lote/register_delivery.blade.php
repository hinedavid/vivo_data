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
				<div class="text-left col-8">
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

					@if(session('status'))
            <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
              {{ session('status') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
				</div>
				<div class="text-right col-4">
					<a href="{{ route('home') }}"><button class="btn fd-button btn-lg" type="reset">Cancelar</button></a>
				</div>

			</div>
			<br>
			{!!Form::open(array('route'=>'create.delivery','method'=>'POST','autocomplete'=>'off'))!!}
	        {{Form::token()}}
					<div class="row">
						<div class="segment col-lg-9 col-md-7 col-sm-12 col-xs-12">
							<div class="row">
								<div class="form-group col-lg-8 col-md-8 col-sm-12 col-xs-12">
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

								<div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<label for="lotes"></label>
									<select class=" form-control fd-control fd-input dynamic-lot" name="lote" id="lote" hidden>
									</select>
								</div>

								<div class="form-group col-12">
									<div class="producto">
										<label for="producto"> </label>
										<input type="text" name="producto" id= "producto" class="form-control fd-input" placeholder="Nombre del producto" disabled hidden>
										<input type="text" name="idproducto" id= "idproducto" hidden>
									</div>
								</div>


								<div class="form-group col-lg-8 col-md-8 col-sm-12 col-xs-12">
									<label for="entregar"> </label>
									<input type="text" name="entregar" id="entregar" class="form-control fd-input" placeholder="" hidden>
								</div>

								<div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="disponible" hidden>
										<label for="disponible"> </label>
									  Disponibles <span class="badge badge-info" id="disponible"> </span>
									</div>
								</div>

								<div class="form-group col-lg-8 col-md-8 col-sm-12 col-xs-12">
									<label for="recibe"></label>
									<select name="recibe" class="form-control fd-input fd-control" id="recibe" hidden>
										<option value="" disabled selected>Recibe</option>
										@if (count($miembros)>0)
											@foreach($miembros as $item)
												<option value="{{$item->idmiembro}}">{{$item->nombre}}</option>
											@endforeach
										@endif
									</select>
								</div>
							</div>
						</div>
						<div class="segment text-right col-lg-3 col-md-5 col-sm-12 col-xs-12">
							<div class=" text-right form-group col-12">
								<div class=" row text-center">
									<label for="date"> </label>
									<div class="input-group date df-datepicker" data-provide="datepicker">
									    <input type="text" class="form-control" name="date" hidden>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group text-center col-12" id="botones">
							<div class="text-right col-12">
								<a href="{{ route('create.delivery') }}"><button class="btn fd-button btn-lg sender" type="submit" hidden>Guardar</button></
							</div>
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
@section('extrajscode')
<script type="text/javascript">


$('.dynamic-provider').change(function(){
	 if ($(this).val()!= '')
	 {
		 var value = $(this).val();
		 $.ajax({
			 	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				url:"{{ route('lote.getlotes') }}",
				method:"POST",
				data:{ idproveedor:value },
				success: function(result){
					 $('#lote').removeAttr('hidden');
					 $('#lote').html(result);
				},
				error: function (request, status, error){
	        $.alert({
	            columnClass: 'col-md-12',
	            icon: 'fa fa-warning',
	            title: 'Notificación del sistema',
	            type: 'red',
	            content: 'Lastimosamente no hay respuesta del sistema, contactar con el administrador del sistema',
	            buttons: {
	              ok: {
	                  text: 'Mmm, esta bien llamaré al administrador',
	                  btnClass: 'btn-red',
	                  action: function(){}
	              }
	            }
	        });
	      }
		 });
	 }
});

$('#entregar').keypress (function(){
	 $('.sender').removeAttr('hidden');
});

$('.dynamic-lot').change(function(){
	 if ($(this).val()!= '')
	 {
		 var value = $(this).val();
	   var badge = $('.disponible').find('.badge');
		 $.ajax({
			 	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				url:"{{ route('lote.getproductname') }}",
				method:"POST",
				data:{ idlote:value },
				success: function(result){
					 $('#producto').removeAttr('hidden');
					 $('#producto').val(result.nombre);
					 $('#idproducto').val(result.idproducto);
					 badge.text(result.disponible);
					 $('.disponible').removeAttr('hidden');
					 $('#entregar').removeAttr('hidden');
					 $('#recibe').removeAttr('hidden');
					 $('#entregar').attr("placeholder", result.medida+" a entregar");
				},
				error: function (request, status, error){
	        $.alert({
	            columnClass: 'col-md-12',
	            icon: 'fa fa-warning',
	            title: 'Notificación del sistema',
	            type: 'red',
	            content: 'Lastimosamente no hay respuesta del sistema, contactar con el administrador del sistema',
	            buttons: {
	              ok: {
	                  text: 'Mmm, esta bien llamaré al administrador',
	                  btnClass: 'btn-red',
	                  action: function(){}
	              }
	            }
	        });
	      }
		 });
	 }
});

$( "form" ).submit(function( event ) {

	if ($("#entregar").val() > $('.disponible').find('.badge').text())
	{
		$.confirm({
			columnClass: 'col-6',
			icon: 'fa fa-warning',
			title: '¡Tenemos un detalle que no puede ser!',
			content: 'Parece que se está haciendo una entrega de producto mayor a la que se tiene registrada en inventario.',
			type: 'red',
			typeAnimated: true,
			buttons: {
				ok: {
						text: 'Ok, completaré la información',
						btnClass: 'btn-red',
						action: function(){}
				}
			}
		});
		event.preventDefault();
	}
	if ('Recibe'=== $('select[name="recibe"] option:selected').text() || 'Número de lote'=== $('select[name="lote"] option:selected').text() || ''=== $("#entregar").val()){
		$.confirm({
			columnClass: 'col-md-12',
			icon: 'fa fa-warning',
			title: '¡Tenemos un datos faltantes!',
			content: 'Parece que tiene datos pendientes por rellenar. Por favor asegurese de rellenar todos los datos.',
			type: 'red',
			typeAnimated: true,
			buttons: {
				ok: {
						text: 'Ok, completaré la información',
						btnClass: 'btn-red',
						action: function(){}
				}
			}
		});
		event.preventDefault();
	}
});

</script>
@endsection
