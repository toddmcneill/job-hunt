<?php

class PostingController extends Controller {
	
	public function __construct() {
		// Default to the posting list view.
		$this->view = new PostingListView();
	}
	
	
	// -------
	// ACTIONS
	// -------
	
	public function defaultAction($params) {
		
	}
	
	// Process the form to add a new posting.
	public function addNewAction() {
		
		// Set the view.
		$this->view = new AddNewPostingView();
		
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
	
	// Gather a list of postings.
	public function listAllAction() {
		
		// Set the view.
		$this->view = new PostingListView();
		
		// Load all postings from the database.
		$postings = $this->loadAllPostings();
		
		// Set the postings on the view.
		$this->view->data['postings'] = $postings;
		
	}
	
	
	// Delete a posting.
	public function deleteAction() {
		
		// Delete the selected posting.
		
		
		
		// Redirect to the posting list view.
		$this->listAllAction();
		
	}
	
	
	// View a posting.
	public function viewPostingAction($params) {
				
		// Set the view.
		$this->view = new ViewPostingView();
		
		// Make sure there is a posting id.
		if (!isset($params->postingId)) {
			return;
		}
		
		// Load the posting from the database.
		$posting = new Posting($params->postingId);
		
		// Set the posting on the view.
		$this->view->data['posting'] = $posting;
		
	}
	
	
	// -----------------
	// SUPPORT FUNCTIONS
	// -----------------
	
	// Returns an array of all posting objects.
	private function loadAllPostings() {
		// Get a list of all pstg_ids.
		$query = "
			SELECT pstg_id
			FROM posting
		";
		$result = DB::query($query);
		
		
		// Create the posting objects.
		$postings = array();
		while ($row = $result->fetch_object()) {
			$postings[] = new Posting($row->pstg_id);
		}
		
		// Return the set of all postings.
		return $postings;
	}
	
	
}

?>