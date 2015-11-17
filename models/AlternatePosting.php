<?php

class AlternatePosting extends Model {
	
	protected
		$apst_id = null,
		$url = '',
		$pstg_id = null,
		$date_added = null;
	
	public function __construct($pstg_id = null) {
		// Load the object from the database.
		if ($pstg_id != null) {
			
		}
	}
	
	protected function getVarNames() {
		$var_names = array(
			'apst_id',
			'url',
			'pstg_id',
			'date_added',
		);
		
		return $var_names;
	}
	
	
	
}

?>