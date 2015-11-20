<?php

class ViewPostingView extends View {
	
	protected function getPageTitle() {
		$str = 'View a Posting';
		return $str;
	}
	
	protected function getPageContent() {
		$posting = $this->data['posting'];
		
		$str = "
			<h2>View a Posting</h2>
			
			<div>
				<div class='posting_field_label'>Posting ID</div>
				<div class='posting_field_value'>".HTML::encodeOutput($posting->getId())."</div>
			</div>
			<div>
				<div class='posting_field_label'>URL</div>
				<div class='posting_field_value'>".HTML::encodeOutput($posting->getUrl())."</div>
			</div>
			<div>
				<div class='posting_field_label'>Company</div>
				<div class='posting_field_value'>".HTML::encodeOutput($posting->getCompany())."</div>
			</div>
			<div>
				<div class='posting_field_label'>Title</div>
				<div class='posting_field_value'>".HTML::encodeOutput($posting->getJobTitle())."</div>
			</div>
			<div>
				<div class='posting_field_label'>Descr</div>
				<div class='posting_field_value'>".HTML::encodeOutput($posting->getJobDescr())."</div>
			</div>
			<div>
				<div class='posting_field_label'>Notes</div>
				<div class='posting_field_value'>".HTML::encodeOutput($posting->getJobNotes())."</div>
			</div>
			<div>
				<div class='posting_field_label'>Rating</div>
				<div class='posting_field_value'>".HTML::encodeOutput($posting->getRating())."</div>
			</div>
			<div>
				<div class='posting_field_label'>Emailed</div>
				<div class='posting_field_value'>".HTML::encodeOutput(is_null($posting->getDateEmailed()) ? 'No' : date("F jS, Y", strtotime($posting->getDateEmailed())))."</div>
			</div>
			<div>
				<div class='posting_field_label'>Reply Received</div>
				<div class='posting_field_value'>".HTML::encodeOutput($posting->getReplyRecvd() ? 'Yes' : 'No')."</div>
			</div>
			<div>
				<div class='posting_field_label'>Reply Notes</div>
				<div class='posting_field_value'>".HTML::encodeOutput($posting->getReplyNotes())."</div>
			</div>
			<div>
				<div class='posting_field_label'>Date Added</div>
				<div class='posting_field_value'>".HTML::encodeOutput(date("F jS, Y", strtotime($posting->getDateAdded())))."</div>
			</div>			
		";
		
		return $str;
	}
	
}

?>