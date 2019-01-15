@extends('layouts.main')
@section('title', 'Fresh&Deli')
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
			<br><br>
			{!!Form::open(array('url'=>'lote','method'=>'POST','autocomplete'=>'off'))!!}
					<div class="row">
						<div class="form-group col-lg-3 col-md-5 col-sm-12 col-xs-12">
							<div class=" row text-center">
								<label for="date"> </label>
								<div class="input-group date df-datepicker" data-provide="datepicker">
								    <input type="text" class="form-control" name="date" hidden>
								</div>
							</div>
						</div>
						<div class="segment col-lg-9 col-md-7 col-sm-12 col-xs-12">
							<div class="row">
								<div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
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

								<div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
									<label for="producto"></label>
									<select class=" form-control fd-control fd-input dynamic-mesure" name="producto"  data-dependent="producto" id="producto">
									</select>
								</div>
								<br><br>
								<div class="form-group text-center col-lg-4 col-md-6 col-sm-12 col-xs-12" id="lote">
									<input type="text" name="lote" class="form-control fd-input" placeholder=" Número de lote">'
								</div>
								<div class="form-group text-center col-lg-4 col-md-4 col-sm-12 col-xs-12" id="medidas">
								</div>
								<div class="form-group text-center col-12" id="botones">
									<div class="text-right col-12">
										<a href="{{ route('lote.create') }}"><button class="btn fd-button btn-lg sender" type="submit" hidden>Guardar</button></
									</div>
								</div>
							</div>
						</div>
					</div>

			{!!Form::close()!!}
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
