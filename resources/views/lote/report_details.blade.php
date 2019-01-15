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
					<h3>Reportes de entregas resultado</h3>
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
			<br><br>

			<div class="row">
						<div class="container">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">id</th>
										<th scope="col">nombre del producto</th>
										<th scope="col">fecha de entrega</th>
										<th scope="col">miembro</th>
										
									</tr>
								</thead>
								<tbody>
								
								    
									
									<tr>
										<th scope="row">17</th>
										<td>Adepex Mini</td>
										<td>21 noviembre 2018</td>
										<td>Empleado 01</td>
									</tr>
							     	
			
								
								</tbody>
							</table>
						</div>


					</div>

		</div>
	</div>
@endsection
