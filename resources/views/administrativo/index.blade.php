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
				<div class="text-center col-12">
					<h3>Productos y provedores</h3>
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

          @if(session('status'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
              {{ session('status') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
				</div>
			</div>
			<br><br>
      <div class="row">
        <div class="text-center col-12">
					<a href="{{ route('admin.register.provider') }}"><button class="btn fd-button col-sm-12 col-xs-12"> Agregar proveedor</button></a>
					<a href="{{ route('admin.register.product') }}"><button class="btn fd-button col-sm-12 col-xs-12"> Agregar producto</button></a>
				</div>
      </div>
      <br><br>
			<div class="row">

          @if(count($stocks) > 0)
            {{ $stocks }}
	        <div class="container">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Proveedor</th>
										<th scope="col">Productos</th>
									</tr>
								</thead>
								<tbody>
                  @foreach( $stocks as $stock )
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $stock->proveedor }}</td>
                      <td>{{ $stock->producto }}</td>
                    </tr>

                  @endforeach
                  <!--
                   -->
								</tbody>
							</table>
							{{$stock->links()}}
						</div>
        @else
          <div class="text-center col-12">
            <div class="card text-center">
              <div class="card-header">
                <h5 class="card-title">No hay registros en el sistema</h5>
              </div>
              <div class="card-body">
                <p class="card-text">Es necesario agregar proveedores y productos.</p>
              </div>
            </div>
          </div>
        @endif
			</div>
		</div>
	</div>
@endsection
