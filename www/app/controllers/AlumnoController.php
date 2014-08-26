<?php

class AlumnoController extends BaseController {

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
			$alumnos = Alumno::all();
			return View::make('alumno-index')
				->with('alumnos', $alumnos);
		} else {
			return View::make('login');
		}
	}
	
	public function nuevoRegistro() {
		if ($this->_logeado) {
			$empresas = Empresa::lists('razon_social', 'id');
			$tipoConductor = TipoConductor::lists('descripcion', 'id');
			$operacion = Operacion::lists('descripcion', 'id');
			return View::make('alumno-nuevo')
				->with('empresas', $empresas)
				->with('tipoConductor', $tipoConductor)
				->with('operacion', $operacion);
		} else {
			return View::make('login');
		}
	}
	
	public function grabarRegistro() {
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'dni' => 'required|numeric',
			'empresa' => 'required',
			'nombre' => 'required|alpha_spaces',
			'apellido' => 'required|alpha_spaces',
			'correo' => 'required|email'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('alumno/nuevo')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$alumno = new Alumno;
			$alumno->dni = Input::get('dni');
			$alumno->empresa = Input::get('empresa');
			$alumno->nombre = Input::get('nombre');
			$alumno->apellido = Input::get('apellido');
			$alumno->correo = Input::get('correo');
			$alumno->tipo = Input::get('tipo');
			$alumno->operacion = Input::get('operacion');
			$alumno->notas = Input::get('notas');
			$alumno->save();

			// redirect
			Session::flash('message', 'Alumno, creado con éxito!');
			return Redirect::to('alumno');
		}
	}
	
	public function mostrarRegistro($id) {
		$alumno = Alumno::find($id);
		$empresas = Empresa::lists('razon_social', 'id');
		$tipoConductor = TipoConductor::lists('descripcion', 'id');
		$operacion = Operacion::lists('descripcion', 'id');
		return View::make('alumno-mostrar')
			->with('alumno', $alumno)
			->with('empresas', $empresas)
			->with('tipoConductor', $tipoConductor)
			->with('operacion', $operacion);
	}
	
	public function editarRegistro() {
		$id = null;
		if (Input::has('id'))
			$id = Input::get('id');
		if ($id === null)
			return Redirect::to('alumno');
		$rules = array(
			'dni' => 'required|numeric',
			'empresa' => 'required',
			'nombre' => 'required|alpha_spaces',
			'apellido' => 'required|alpha_spaces',
			'correo' => 'required|email'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('alumno/mostrar/' . $id)
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$alumno = Alumno::find($id);
			$alumno->dni = Input::get('dni');
			$alumno->empresa = Input::get('empresa');
			$alumno->nombre = Input::get('nombre');
			$alumno->apellido = Input::get('apellido');
			$alumno->correo = Input::get('correo');
			$alumno->tipo = Input::get('tipo');
			$alumno->operacion = Input::get('operacion');
			$alumno->notas = Input::get('notas');
			$alumno->save();

			// redirect
			Session::flash('message', 'Alumno, actualizado con éxito!');
			return Redirect::to('alumno');
		}
	}
	
}
