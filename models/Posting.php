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
			$this->loadFromDb($pstg_id);
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
	
	protected function getDbSaveArray() {
		$row = array(
			'url' => $this->url,
			'company' => $this->company,
			'job_title' => $this->job_title,
			'job_descr' => $this->job_descr,
			'job_notes' => $this->job_notes,
			'rating' => $this->rating,
			'date_emailed' => $this->date_emailed,
			'reply_recvd' => $this->reply_recvd,
			'reply_notes' => $this->reply_notes
		);
		
		if (!$this->isNewObject()) {
			$row['pstg_id'] = $this->pstg_id;
		}
		
		return $row;
	}
	
	protected function isNewObject() {
		return is_null($this->pstg_id);
	}
	
	protected function getTableName() {
		return 'posting';
	}
	
	protected function getPrimaryKeyName() {
		return 'pstg_id';
	}
	
	
}

?>