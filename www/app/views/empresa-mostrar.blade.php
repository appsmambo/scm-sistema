@extends('layouts.master')
@section('content')
			<div class="row">
				<div class="col-lg-12">
					<div class="page-header">
						<h1 id="tables">
							Mostrar empresa
							<a href="{{ URL::to('empresa') }}" class="btn btn-danger btn-xs pull-right"><span class="glyphicon glyphicon-remove-circle"></span> Regresar</a>
						</h1>
					</div>
					<div class="bs-component">
						{{ HTML::ul($errors->all()) }}
						{{ Form::open(array('url' => 'empresa/editar')) }}
							{{ Form::hidden('id', $empresa->id) }}
							<div class="form-group">
								{{ Form::label('ruc', 'Ruc') }}
								{{ Form::text('ruc', $empresa->ruc, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('razon_social', 'Razón Social') }}
								{{ Form::text('razon_social', $empresa->razon_social, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('correo', 'E-mail') }}
								{{ Form::text('correo', $empresa->correo, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('contacto', 'Contacto') }}
								{{ Form::text('contacto', $empresa->contacto, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('direccion', 'Dirección') }}
								{{ Form::text('direccion', $empresa->direccion, array('class' => 'form-control')) }}
							</div>
							<div class="form-group">
								{{ Form::label('telefono', 'Teléfono') }}
								{{ Form::text('telefono', $empresa->telefono, array('class' => 'form-control')) }}
							</div>
							{{ Form::submit('Editar empresa', array('class' => 'btn btn-primary')) }}
						{{ Form::close() }}
					</div>
				</div>
			</div>
@stop