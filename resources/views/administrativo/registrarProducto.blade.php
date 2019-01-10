@extends('layouts.main')
@section('title', 'Productos y provedores')
@section('menu')
@component('layouts.menu')
@endcomponent
@endsection
@section('content')
	<div class="main-content">
		<div class="container">
			<div class="row">
				<div class="text-center col-8">
					<h3>Registrar productos</h3>
					@if (count($errors)>0)
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<ul>
							@foreach ($errors->all() as $error)
								<li>{{$error}}</li>
							@endforeach
							</ul>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					@endif
				</div>
				<div class="text-center col-4">
					<a href="{{ route('admin.index') }}"><button class="btn fd-button btn-lg" type="reset">Cancelar</button></a>
				</div>
			</div>
			<div class="row">
				@if(!isset($proveedores))
					<div class="text-center col-12">
	          <div class="alert alert-warning alert-dismissible fade show" role="alert">
	          	<strong> Lamentablemente ¡no hay proveedores registrados en el sistema!</strong>
							<br>
							<br>
							<a href="{{ route('admin.register.provider') }}"><button class="btn fd-button col-12"> Agregar proveedor</button></a>
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
	          </div>
          </div>
				@else
					<div class="<container h-100">
						<div class="row h-100 justify-content-center align-items-center">
							{!!Form::open(array('route'=>'admin.store.product','method'=>'POST','autocomplete'=>'off'))!!}
								<div class="row">
									<div class="form-group form-group col-12">
			              <label for="proveedor" class="row align-items-center justify-content-center"> </label>
			              <select class=" form-control  fd-input fd-control" name="proveedor" id="proveedor">
											<option value="" disabled selected>Proveedor</option>
			                @foreach($proveedores as $item)
			                  <option value="{{$item->idproveedor}}">{{$item->nombre}}</option>
			                @endforeach
			              </select>
									</div>
								</div>
								<br><br>
								<div class="row">
									<div class="form-group form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
				          	<label for="producto" class="row align-items-center justify-content-center"></label>
				          	<input type="text" name="producto" class="form-control fd-input" placeholder="Nombre de producto">
				          </div>

									<div class="form-group form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
										<label for="medida" class="row align-items-center justify-content-center"> </label>
										<input type="text" name="medida" class="form-control fd-input" placeholder="Nombre de la medida">
									</div>

									<div class="form-group form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
										<label for="discreta" class="row align-items-center justify-content-center"> </label>
										<input name="discreta" id="checkboxdiscreta" type="checkbox" value= "1" checked>
										<span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="bottom" title="La medida discreta aplica para unidades, no seleccione la opción si se usan decimales en la medida">
					            <label for="checkboxdiscreta">
					               Es una medida discreta
					            </label>
										</span>
									</div>
								</div>
								<br><br><br>
								<div class="row">
									<div class="text-center col-12">
										<button class="btn fd-button btn-lg" type="submit"> Guardar</button>
									</div>
								</div>
							{!!Form::close()!!}
						</div>
				  </div>
	      @endif
			</div>
	  </div>
  </div>
@endsection
