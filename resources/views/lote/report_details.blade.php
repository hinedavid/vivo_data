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
										<th scope="col">#</th>
										<th scope="col">Make</th>
										<th scope="col">Model</th>
										<th scope="col">Year</th>
										<th scope="col">Cost</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">1</th>
										<td>Mark</td>
										<td>Otto</td>
										<td>@mdo</td>
										<td>500</td>
									</tr>
									<tr>
										<th scope="row">2</th>
										<td>Jacob</td>
										<td>Thornton</td>
										<td>@fat</td>
										<td>500</td>
									</tr>
									<tr>
										<th scope="row">3</th>
										<td>Larry</td>
										<td>the Bird</td>
										<td>@twitter</td>
										<td>500</td>
									</tr>
								</tbody>
							</table>
						</div>


					</div>

		</div>
	</div>
@endsection
