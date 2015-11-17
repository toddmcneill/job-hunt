<?php

abstract class Model {
	
	
	// Should return an array of object variable names.
	protected abstract function getVarNames();
	
	
	// Loads this object from the database specified by the table name and the primary key (id) value.
	protected function loadFromDb($table, $id) {
		$query = "
			SELECT *
			FROM ".$table."
			WHERE id=".$id."
		";
		
		$result = DB::query($query);
		if ($row = $result->fetch_object()) {
			$this->loadFromDbRow($row);
		}
	}
	
	
	// Accepts either an object or an associative array representing a database record.
	private function loadFromDbRow($row) {
		
		if (is_object($row)) {
			// The row is an object.
			$row_data = get_object_vars($row);
		} else if (is_array($row)) {
			// The row is an array.
			$row_data = $row;
		} else {
			// The row type is not recognized.
			return;
		}
		
		// Assign class variables from the row data.
		$var_names = $this->getVarNames();
		foreach ($row_data as $var_name => $value) {
			// Only assign the value if it's a defined class variable.
			if (in_array($var_name, $var_names)) {
				$this->$var_name = $value;
			}
		}
		
	}
	
	
	// Auto getter and setter functions.
	// http://stackoverflow.com/a/8743064
	public function __call($method, $params) {
		
		// Auto getter.
		if (strncasecmp($method, 'get', 3) == 0) {
			$var = $this->convertCamelCaseToUnderscore(substr($method, 3));
			return $this->$var;
		}
		// Auto setter.
		if (strncasecmp($method, 'set', 3) == 0) {
			$var = $this->convertCamelCaseToUnderscore(substr($method, 3));
			$this->$var = $params[0];
		}
	}
	
	
	// Convert a camel case variable to underscore.
	// http://stackoverflow.com/a/1993772
	private function convertCamelCaseToUnderscore($str) {
		
		preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $str, $matches);
		$ret = $matches[0];
		foreach ($ret as &$match) {
			$match = (($match == strtoupper($match)) ? strtolower($match) : lcfirst($match));
		}
		return implode('_', $ret);
		
	}
	
	
}

?>