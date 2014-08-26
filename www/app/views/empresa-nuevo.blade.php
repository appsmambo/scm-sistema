@extends('layouts.master')
@section('content')
			<div class="row">
				<div class="col-lg-12">
					<div class="page-header">
						<h1 id="tables">
							Crear empresa
							<a href="{{ URL::to('empresa') }}" class="btn btn-danger btn-xs pull-right"><span class="glyphicon glyphicon-remove-circle"></span> Regresar</a>
						</h1>
					</div>
					<div class="bs-component">
						{{ HTML::ul($errors->all()) }}
						{{ Form::open(array('url' => 'empresa/guardar')) }}
							<div class="form-group">
								{{ Form::label('ruc', 'Ruc') }}
								{{ Form::text('ruc', Input::old('ruc'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('razon_social', 'Razón Social') }}
								{{ Form::text('razon_social', Input::old('razon_social'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('correo', 'E-mail') }}
								{{ Form::text('correo', Input::old('correo'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('contacto', 'Contacto') }}
								{{ Form::text('contacto', Input::old('contacto'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('direccion', 'Dirección') }}
								{{ Form::text('direccion', Input::old('direccion'), array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('telefono', 'Teléfono') }}
								{{ Form::text('telefono', Input::old('telefono'), array('class' => 'form-control')) }}
							</div>
							{{ Form::submit('Grabar empresa', array('class' => 'btn btn-primary')) }}
						{{ Form::close() }}
					</div>
				</div>
			</div>
@stop