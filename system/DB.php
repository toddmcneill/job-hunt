<?php

class DB {
	
	// This is the single static link used by all database-related functionality.
	public static $link = null;
	
	
	// Establishes a connection to the database if none exists.
	public static function connectToDb() {
		if (is_null(self::$link)) {
			self::$link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
			
			// Kill the script if there's a database connetion error.
			if (self::$link->connect_error) {
				die("DB connection error [ ".self::$link->connect_errno." ]: ".self::$link->connect_error);
			}
		}
	}
	
	
	// Executes a query and returns the result.
	// If all 3 parameters are used, the query is processed as a prepared statement.
	// $query: A string containing the sql query.
	// $param_types: A string containing s, i, d, or b corresponding to each parameter in a prepared statement.
	// $params: An array containing the parameters used in a prepared statement.
	public static function query($query, $param_types = null, $params = null) {
		// Make sure a connection exists.
		self::connectToDb();
		
		// Check to see if the query should be executed as a prepared statement.
		if (!is_null($param_types) && !is_null($params)) {
			return self::preparedResultQuery($query, $param_types, $params);
		}
		
		// Execute the query and get the query result.
		if (!$result = self::$link->query($query)) {
			echo "DB query error [ ".self::$link->errno." ]: ".self::$link->error;
			return false;
		}
		
		// Return the query result.
		return $result;
	}
	
	
	
	// Executes a query using a prepared statement and returns the result.
	public static function preparedResultQuery($query, $param_types, $params) {
		// Make sure a connection exists.
		self::connectToDb();
		
		// Prepare the query.
		if (!$statement = self::$link->prepare($query)) {
			echo "DB statement preparation error [ ".self::$link->errno." ]: ".self::$link->error;
			return false;
		}
		
		// Bind parameters.
		if ($statement->bind_param($param_types, $params)) {
			echo "DB binding parameters error [ ".$statement->errno." ]: ".$statement->error;
			return false;
		}
		
		// Execute the query.
		if (!$statement->execute()) {
			echo "DB statement execution error [ ".$statement->errno." ]: ".$statement->error;
			return false;
		}
		
		// Get the query result.
		if (!$result = $statement->get_result()) {
			echo "DB result fetch error [ ".$statement->errno." ]: ".$statement->error;
			return false;
		}
		
		// Return the query result.
		return $result;;
	}
	
	
	
	
	
	
}

?>