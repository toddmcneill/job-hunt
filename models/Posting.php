<?php

class Posting extends Model {
	
	protected
		$pstg_id = null,
		$url = null,
		$company = null,
		$job_title = '',
		$job_descr = '',
		$job_notes = '',
		$rating = null,
		$date_emailed = null,
		$reply_recvd = false,
		$reply_notes = null,
		$date_added = null;
	
	public function __construct($pstg_id = null) {
		// Load the object from the database.
		if ($pstg_id != null) {
			$this->loadFromDb('posting', $pstg_id);
		}
	}
	
	protected function getVarNames() {
		$var_names = array(
			'pstg_id',
			'url',
			'company',
			'job_title',
			'job_descr',
			'job_notes',
			'rating',
			'date_emailed',
			'reply_recvd',
			'reply_notes',
			'date_added'
		);
		
		return $var_names;
	}
	
	
	
}

?>