<?php

// Use this class to access $_POST variables. They'll be saved in $_SESSION instead.
class Params {

	
	// Initializes the $_SESSION['params'] variable.
	public static function init() {
		$_SESSION['params'] = array();
	}
	
	// Returns whether the $_SESSION['params'] variable is set.
	public static function exist() {
		return isset($_SESSION['params']);
	}
	
	// Returns whether a parameter exists.
	public static function isParamSet($param) {
		return isset($_SESSION['params'][$param]);
	}
	
	// Returns a single parameter.
	public static function getParam($param) {
		return $_SESSION['params'][$param];
	}
	
	// Returns all parameters.
	public static function getAll() {
		return $_SESSION['params'];
	}
	
	
	
	// Performs the Post/Get/Redirect process.
	public static function pgr() {
		// Check to see if there is POST data.
		if (count($_POST) > 0) {
			// Initialize the $_SESSION['params'] variable.
			Params::init();
			
			// Copy the contents of $_POST to $_SESSION['params'].
			Params::transferPostToSession();
			
			// Redirect.
			header('HTTP/1.1 303 See Other');
			header('Location: '.$_SERVER['REQUEST_URI']);
			die();
		}
	}
	
	// Transfers the contents of $_POST to $_SESSION['params'].
	public static function transferPostToSession() {
		foreach ($_POST as $key => $value) {
			$_SESSION['params'][$key] = $value;
		}
	}
	
	// Clears the $_SESSION['params'] variable.
	public static function clearSessionParams() {
		unset($_SESSION['params']);
	}

	
}

?>