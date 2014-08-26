<?php

class HomeController extends BaseController {
	
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
	
	public function inicio() {
		if ($this->_logeado) {
			return View::make('inicio');
		} else {
			return View::make('login');
		}
	}

	public function doLogin() {
		// Fuente:
		// http://scotch.io/tutorials/simple-and-easy-laravel-login-authentication
		Session::forget('userAuth');
		$rules = array(
			'email' => 'required|email', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			Session::flash('error', 'Datos incorrectos, vuelve a intentarlo.');
			return Redirect::to('/');
		} else {
			$userdata = array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			);
			if (Auth::attempt($userdata)) {
				$now = time();
				Session::push('last_activity', $now);
				Session::push('userAuth', 1);
				return View::make('inicio');
			} else {
				Session::flash('error', 'Tu email o password son incorrectos, vuelve a intenralo.');
				return Redirect::to('/');
			}
		}
	}

	public function doLogout() {
		Session::forget('userAuth');
		Auth::logout();
		if (Session::has('timeout')) {
			Session::flash('timeout', 'Tu sesión ha terminado, vuelve a ingresar.');
		}
		return Redirect::to('/');
	}

}
