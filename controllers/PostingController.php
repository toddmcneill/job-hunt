<?php

class PostingController extends Controller {
	
	public function __construct() {
		$this->view = new AddNewPostingView();
	}
	
	public function defaultAction($params) {
		
	}
	
	public function addNewAction($params) {
		echo 'adding new';
	}
	
}

?>