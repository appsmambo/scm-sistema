@extends('layouts.master')
@section('content')
			<div class="row">
				<div class="col-lg-12">
					<div class="page-header">
						<h1 id="tables">
							Empresas
							<a href="{{ URL::to('empresa/nuevo') }}" class="btn btn-success btn-xs pull-right"><span class="glyphicon glyphicon-plus"></span> Nuevo</a>
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
									<th>Razón Social</th>
									<th>Ruc</th>
									<th>E-mail</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
							@foreach($empresas as $key => $value)
								<tr>
									<td>{{ $value->id }}</td>
									<td>{{ $value->razon_social }}</td>
									<td>{{ $value->ruc }}</td>
									<td>{{ $value->correo }}</td>
									<!-- we will also add show, edit, and delete buttons -->
									<td>
										<a class="btn btn-xs btn-info" href="{{ URL::to('empresa/mostrar/' . $value->id) }}">Editar</a>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
@stop