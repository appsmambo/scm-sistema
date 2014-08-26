@extends('layouts.master')
@section('content')
			<div class="row">
				<div class="col-lg-12">
					<div class="page-header">
						<h1 id="tables">
							Alumnos
							<a href="{{ URL::to('alumno/nuevo') }}" class="btn btn-success btn-xs pull-right"><span class="glyphicon glyphicon-plus"></span> Nuevo</a>
						</h1>
					</div>
					<div class="bs-component">
						@if (Session::has('message'))
							<div class="alert alert-info">{{ Session::get('message') }}</div>
						@endif
						<table class="table table-striped table-hover ">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Dni</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
							@foreach($alumnos as $key => $value)
								<tr>
									<td>{{ $value->id }}</td>
									<td>{{ $value->nombre }}</td>
									<td>{{ $value->dni }}</td>
									<td>
										<a class="btn btn-xs btn-info" href="{{ URL::to('alumno/mostrar/' . $value->id) }}">Editar</a>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
@stop