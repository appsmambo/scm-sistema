@extends('layouts.master')
@section('content')
			<!-- if there are login errors, show them here -->
			@if (Session::has('timeout'))
			<div class="alert alert-dismissable alert-warning">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<h4>Mensaje:</h4>
				{{ Session::get('timeout') }}
			</div>
			@endif
			@if (Session::has('error'))
			<div class="alert alert-dismissable alert-danger">
				<button type="button" class="close" data-dismiss="alert">×</button>
				{{ Session::get('error') }}
			</div>
			@endif
			<div class="well bs-component">
				<form name="acceso" id="login" method="post" action="login" class="form-horizontal">
					<?php echo Form::token(); ?>
					<fieldset>
						<legend>Acceso a la INTRANET</legend>
						<div class="form-group">
							<label for="email" class="col-lg-2 control-label">Email</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" id="email" name="email" placeholder="Ingresa tu email">
							</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-lg-2 control-label">Password</label>
							<div class="col-lg-10">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-10 col-lg-offset-2">
								<button type="submit" class="btn btn-primary">Ingresar</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
@stop