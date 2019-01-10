@extends('layouts.main')
@section('title', 'Registrar provedores')
@section('menu')
@component('layouts.menu')
@endcomponent
@endsection
@section('content')
	<div class="main-content">
		<div class="container">
			<div class="row">
				<div class="text-center col-8">
					<h3>Registrar proveedores</h3>
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
					@if(isset($result))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
				    	{{ $result }}
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
			<br><br>
			<div class="row">
				<div class="<container h-100">
					<div class="row h-100 justify-content-center align-items-center">
						{!!Form::open(array('route'=>'admin.store.provider','method'=>'POST','autocomplete'=>'off'))!!}
						{{Form::token()}}
							<div class="form-group col-12">
								<label for="proveedor"></label>
								<input type="text" name="proveedor" class="form-control fd-input" placeholder="Nombre del proveedor" required>
							</div>
							<br>
							<div class="text-center col-12">
								<button class="btn fd-button btn-lg" type="submit"> Guardar</button>
							</div>
						{!!Form::close()!!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
