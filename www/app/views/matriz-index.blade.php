@extends('layouts.master')
@section('content')
			<div class="row">
				<div class="col-lg-12">
					<div class="page-header">
						<h1 id="tables">
							Cursos
							<a href="{{ URL::to('cursos/nuevo') }}" class="btn btn-success btn-xs pull-right"><span class="glyphicon glyphicon-plus"></span> Nuevo</a>
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
									<th>Título</th>
									<th>Descripción</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
							
							</tbody>
						</table>
					</div>
				</div>
			</div>
@stop