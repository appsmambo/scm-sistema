<?php

class OperacionController extends BaseController {

	private $_timeSession = 120;
	private $_logeado = true;
	
	public function __construct() {
		/*if (Auth::check()) {
			$now = time();
			$last_activity = Session::get('last_activity');
			$diff = $now - $last_activity[0];
			if ($diff > $this->_timeSession) {
				return Redirect::to('logout')->with('timeout', 1);
			}
			$this->_logeado = true;
			Session::push('last_activity', $now);
		}*/
	}
	
	public function index() {
		if ($this->_logeado) {
			$operacion = Operacion::all();
			return View::make('operacion-index')
				->with('operacion', $operacion);
		} else {
			return View::make('login');
		}
	}
	
	public function nuevoRegistro() {
		if ($this->_logeado) {
			return View::make('operacion-nuevo');
		} else {
			return View::make('login');
		}
	}
	
	public function grabarRegistro() {
		$rules = array(
			'descripcion' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('operacion/nuevo')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$operacion = new Operacion;
			$operacion->descripcion = Input::get('descripcion');
			$operacion->save();

			// redirect
			Session::flash('message', 'Operación, creado con éxito!');
			return Redirect::to('operacion');
		}
	}
	
	public function mostrarRegistro($id) {
		$operacion = Operacion::find($id);
		return View::make('operacion-mostrar')
				->with('operacion', $operacion);
	}
	
	public function editarRegistro() {
		$id = null;
		if (Input::has('id'))
			$id = Input::get('id');
		if ($id === null)
			return Redirect::to('operacion');
		$rules = array(
			'descripcion' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('operacion/mostrar/' . $id)
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$operacion = Operacion::find($id);
			$operacion->descripcion = Input::get('descripcion');
			$operacion->save();

			// redirect
			Session::flash('message', 'Operación, actualizado con éxito!');
			return Redirect::to('operacion');
		}
	}
	
}
