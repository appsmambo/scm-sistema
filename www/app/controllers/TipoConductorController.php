<?php

class TipoConductorController extends BaseController {

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
			$tipo = TipoConductor::all();
			return View::make('tipoconductor-index')
				->with('tipo', $tipo);
		} else {
			return View::make('login');
		}
	}
	
	public function nuevoRegistro() {
		if ($this->_logeado) {
			return View::make('tipoconductor-nuevo');
		} else {
			return View::make('login');
		}
	}
	
	public function grabarRegistro() {
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'descripcion' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('tipo-conductor/nuevo')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$tipoConductor = new TipoConductor;
			$tipoConductor->descripcion = Input::get('descripcion');
			$tipoConductor->save();

			// redirect
			Session::flash('message', 'Tipo de conductor, creado con éxito!');
			return Redirect::to('tipo-conductor');
		}
	}
	
	public function mostrarRegistro($id) {
		$tipoConductor = TipoConductor::find($id);
		return View::make('tipoconductor-mostrar')
				->with('tipo', $tipoConductor);
	}
	
	public function editarRegistro() {
		$id = null;
		if (Input::has('id'))
			$id = Input::get('id');
		if ($id === null)
			return Redirect::to('tipo-conductor');
		$rules = array(
			'descripcion' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('tipo-conductor/mostrar/' . $id)
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$tipoConductor = TipoConductor::find($id);
			$tipoConductor->descripcion = Input::get('descripcion');
			$tipoConductor->save();

			// redirect
			Session::flash('message', 'Tipo de conductor, actualizado con éxito!');
			return Redirect::to('tipo-conductor');
		}
	}
	
}
