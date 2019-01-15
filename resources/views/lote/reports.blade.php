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

								<div class="form-group col-lg-4 col-md-2 col-sm-6 col-xs-12">
									<label for="producto"></label>
									<select class=" form-control fd-control fd-input dynamic-mesure" name="producto"  data-dependent="producto" id="producto">
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


@section('extrajscode')
<script type="text/javascript">


$('.dynamic-provider').change(function(){
	 if ($(this).val()!= '')
	 {
		 var value = $(this).val();
		 console.log(value);
		 $.ajax({
			 	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				url:"{{ route('lote.getproducts') }}",
				method:"POST",
				data:{ idproveedor:value },
				success: function(result){
					 $('#producto').html(result);
				},
				error: function (request, status, error){
	        $.alert({
	            columnClass: 'col-md-12',
	            icon: 'fa fa-warning',
	            title: 'Notificación del sistema',
	            type: 'red',
	            content: 'Lastimosamente no hay respuesta del sistema, contactar con el administrador del sistema producto',
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

$('#medidas').keypress (function(){
	 $('.sender').removeAttr('hidden');
});

$('.dynamic-mesure').change(function(){
	 if ($(this).val()!= '')
	 {
		 var value = $(this).val();
		 $.ajax({
			 	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				url:"{{ route('lote.getmesures') }}",
				method:"POST",
				data:{ idproducto:value },
				
				success: function(result){
					 $('#medidas').html(result);
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
</script>
@endsection
