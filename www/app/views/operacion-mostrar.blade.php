@extends('layouts.master')
@section('content')
			<div class="row">
				<div class="col-lg-12">
					<div class="page-header">
						<h1 id="tables">
							Mostrar operación
							<a href="{{ URL::to('operacion') }}" class="btn btn-danger btn-xs pull-right"><span class="glyphicon glyphicon-remove-circle"></span> Regresar</a>
						</h1>
					</div>
					<div class="bs-component">
						{{ HTML::ul($errors->all()) }}
						{{ Form::open(array('url' => 'operacion/editar')) }}
							{{ Form::hidden('id', $operacion->id) }}
							<div class="form-group">
								{{ Form::label('descripcion', 'Descripción') }}
								{{ Form::text('descripcion', $operacion->descripcion, array('class' => 'form-control')) }}
							</div>
							{{ Form::submit('Editar operación', array('class' => 'btn btn-primary')) }}
						{{ Form::close() }}
					</div>
				</div>
			</div>
@stop