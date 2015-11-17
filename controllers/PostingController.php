<?php

class PostingController extends Controller {
	
	public function __construct() {
		$this->view = new AddNewPostingView();
	}
	
	public function defaultAction($params) {
		
	}
	
	// Process the form to add a new posting.
	public function addNewAction($params) {
		
		var_dump($_POST);
		
		
		
		
		
	}
	
}

?>