<?php

class PostingController extends Controller {
	
	public function __construct() {
		$this->view = new AddNewPostingView();
	}
	
	
	// -------
	// ACTIONS
	// -------
	
	public function defaultAction($params) {
		
	}
	
	// Process the form to add a new posting.
	public function addNewAction($params) {
		
		// Make sure we're processing the correct form.
		if (Params::getParam('form_complete') != 'add_new_posting') {
			return;
		}
		
		// Create a new posting object.
		$posting = new Posting();
		
		// Save form data to the posting object.
		$posting->setUrl(Params::getParam('url'));
		$posting->setCompany(Params::getParam('company'));
		$posting->setJobTitle(Params::getParam('job_title'));
		$posting->setJobDescr(Params::getParam('job_descr'));
		$posting->setJobNotes(Params::getParam('job_notes'));
		$posting->setRating(Params::getParam('rating'));
		$posting->setDateEmailed((Params::getParam('emailed') == 'true' ? Params::getParam('date_emailed') : ''));
		$posting->setReplyRecvd(Params::getParam('reply_recvd') == 'true');
		$posting->setReplyNotes(Params::getParam('reply_notes'));
		
		// Save the posting object.
		$posting->saveToDb();
		
	}
	
	
	// -----------------
	// SUPPORT FUNCTIONS
	// -----------------
	
	
	
}

?>