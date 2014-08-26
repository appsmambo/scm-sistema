<?php

class EmpresaController extends BaseController {

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
			$empresas = Empresa::all();
			return View::make('empresa-index')
				->with('empresas', $empresas);
		} else {
			return View::make('login');
		}
	}
	
	public function nuevoRegistro() {
		if ($this->_logeado) {
			return View::make('empresa-nuevo');
		} else {
			return View::make('login');
		}
	}
	
	public function grabarRegistro() {
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'ruc' => 'required|numeric',
			'razon_social' => 'required',
			'correo' => 'required|email',
			'contacto' => 'required',
			'direccion' => 'required',
			'telefono' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('empresa/nuevo')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$empresa = new Empresa;
			$empresa->ruc = Input::get('ruc');
			$empresa->razon_social = Input::get('razon_social');
			$empresa->correo = Input::get('correo');
			$empresa->contacto = Input::get('contacto');
			$empresa->direccion = Input::get('direccion');
			$empresa->telefono = Input::get('telefono');
			$empresa->save();

			// redirect
			Session::flash('message', 'Empresa, creado con éxito!');
			return Redirect::to('empresa');
		}
	}
	
	public function mostrarRegistro($id) {
		$empresa = Empresa::find($id);
		return View::make('empresa-mostrar')
			->with('empresa', $empresa);
	}
	
	public function editarRegistro() {
		$id = null;
		if (Input::has('id'))
			$id = Input::get('id');
		if ($id === null)
			return Redirect::to('empresa');
		$rules = array(
			'ruc' => 'required|numeric',
			'razon_social' => 'required',
			'correo' => 'required|email',
			'contacto' => 'required',
			'direccion' => 'required',
			'telefono' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('empresa/mostrar/' . $id)
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$empresa = Empresa::find($id);
			$empresa->ruc = Input::get('ruc');
			$empresa->razon_social = Input::get('razon_social');
			$empresa->correo = Input::get('correo');
			$empresa->contacto = Input::get('contacto');
			$empresa->direccion = Input::get('direccion');
			$empresa->telefono = Input::get('telefono');
			$empresa->save();

			// redirect
			Session::flash('message', 'Empresa, actualizado con éxito!');
			return Redirect::to('empresa');
		}
	}
	
}
