@extends('layouts.master')
@section('content')
			<div class="row">
				<div class="col-lg-12">
					<div class="page-header">
						<h1 id="tables">
							Crear alumno
							<a href="{{ URL::to('alumno') }}" class="btn btn-danger btn-xs pull-right"><span class="glyphicon glyphicon-remove-circle"></span> Regresar</a>
						</h1>
					</div>
					<div class="bs-component">
						{{ HTML::ul($errors->all()) }}
						{{ Form::open(array('url' => 'alumno/guardar')) }}
							<div class="form-group">
								{{ Form::label('dni', 'Dni') }}
								{{ Form::text('dni', Input::old('ruc'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('empresa', 'Empresa') }}
								{{ Form::select('empresa', $empresas, null, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('nombre', 'Nombre') }}
								{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('apellido', 'Apellido') }}
								{{ Form::text('apellido', Input::old('apellido'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('correo', 'E-mail') }}
								{{ Form::text('correo', Input::old('correo'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('tipo', 'Tipo de conductor') }}
								{{ Form::select('tipo', $tipoConductor, null, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('operacion', 'Operación') }}
								{{ Form::select('operacion', $operacion, null, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('notas', 'Notas') }}
								{{ Form::textarea('notas', Input::old('notas'), array('class' => 'form-control')) }}
							</div>
							{{ Form::submit('Grabar alumno', array('class' => 'btn btn-primary')) }}
						{{ Form::close() }}
					</div>
				</div>
			</div>
@stop