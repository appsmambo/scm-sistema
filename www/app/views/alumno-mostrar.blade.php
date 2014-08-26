@extends('layouts.master')
@section('content')
			<div class="row">
				<div class="col-lg-12">
					<div class="page-header">
						<h1 id="tables">
							Mostrar alumno
							<a href="{{ URL::to('alumno') }}" class="btn btn-danger btn-xs pull-right"><span class="glyphicon glyphicon-remove-circle"></span> Regresar</a>
						</h1>
					</div>
					<div class="bs-component">
						{{ HTML::ul($errors->all()) }}
						{{ Form::open(array('url' => 'alumno/editar')) }}
							{{ Form::hidden('id', $alumno->id) }}
							<div class="form-group">
								{{ Form::label('dni', 'Dni') }}
								{{ Form::text('dni', $alumno->dni, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('empresa', 'Empresa') }}
								{{ Form::select('empresa', $empresas, $alumno->empresa, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('nombre', 'Nombre') }}
								{{ Form::text('nombre', $alumno->nombre, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('apellido', 'Apellido') }}
								{{ Form::text('apellido', $alumno->apellido, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('correo', 'E-mail') }}
								{{ Form::text('correo', $alumno->correo, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('tipo', 'Tipo de conductor') }}
								{{ Form::select('tipo', $tipoConductor, $alumno->tipo, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('operacion', 'Operación') }}
								{{ Form::select('operacion', $operacion, $alumno->operacion, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('notas', 'Notas') }}
								{{ Form::textarea('notas', $alumno->notas, array('class' => 'form-control')) }}
							</div>
							{{ Form::submit('Editar alumno', array('class' => 'btn btn-primary')) }}
						{{ Form::close() }}
					</div>
				</div>
			</div>
@stop