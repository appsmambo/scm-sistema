@extends('layouts.master')
@section('content')
			<div class="row">
				<div class="col-lg-12">
					<div class="page-header">
						<h1 id="tables">
							Crear matriz de curso
							<a href="{{ URL::to('cursos') }}" class="btn btn-danger btn-xs pull-right"><span class="glyphicon glyphicon-remove-circle"></span> Regresar</a>
						</h1>
					</div>
					<div class="bs-component">
						{{ HTML::ul($errors->all()) }}
						{{ Form::open(array('url' => 'cursos/guardar')) }}
							<ul class="nav nav-tabs" role="tablist">
								<li class="active"><a href="#info" role="tab" data-toggle="tab">Info de la matriz</a></li>
								<li><a href="#matriz" role="tab" data-toggle="tab">Agregar módulos</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="info">
									<div class="row">
										<div class="col-lg-8 col-lg-offset-2">
											<br>
											<div class="form-group">
												{{ Form::label('titulo', 'Título') }}
												{{ Form::text('titulo', Input::old('titulo'), array('class' => 'form-control')) }}
											</div>
											<div class="form-group">
												{{ Form::label('descripcion', 'Descripción') }}
												{{ Form::textarea('descripcion', Input::old('descripcion'), array('class' => 'form-control')) }}
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="matriz">
									<div class="row">
										<div class="col-lg-8 col-lg-offset-2">
											<br>
											<div class="input-group">
												<input id="modulo" type="text" class="form-control" placeholder="Titulo de módulo">
												<span class="input-group-btn">
													<button id="agregarModulo" class="btn btn-primary" type="button"><span class="glyphicon glyphicon-plus-sign"></span> Agregar módulo</button>
												</span>
											</div>
											<br>
											<div class="bloqueModulos"></div>
										</div>
									</div>
									<br>
									
											
								</div>
							</div>
							{{ Form::submit('Grabar matriz', array('class' => 'btn btn-primary')) }}
						{{ Form::close() }}
					</div>
				</div>
			</div>
@stop