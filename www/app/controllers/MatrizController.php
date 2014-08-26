<?php

class MatrizController extends BaseController {

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
			return View::make('matriz-index');
		} else {
			return View::make('login');
		}
	}
	
	public function nuevoRegistro() {
		if ($this->_logeado) {
			return View::make('matriz-nuevo');
		} else {
			return View::make('login');
		}
	}
}