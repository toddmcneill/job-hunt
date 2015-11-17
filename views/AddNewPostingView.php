<?php

class AddNewPostingView extends View {
	
	protected function getPageTitle() {
		$str = 'Add New Posting';
		return $str;
	}
	
	protected function getPageContent() {
		$str = "
			<h2>Add New Job Posting</h2>
			
			<form action='/posting/addNew' method='post'>				
				<div class='form_row'>
					<input type='text' name='url' placeholder='URL' />
				</div>
				<div class='form_row'>
					<input type='text' name='company' placeholder='Company' />
				</div>
				<div class='form_row'>
					<input type='text' name='job_title' placeholder='Job Title' />
				</div>
				<div class='form_row'>
					<textarea name='job_descr' placeholder='Job Description'></textarea>
				</div>
				<div class='form_row'>
					<textarea name='job_notes' placeholder='Job Notes'></textarea>
				</div>
				<div class='form_row'>
					<label>
						<span>Rating</span>
						<input type='range' name='rating' min='1' max='5' value='3' />
					</label>
				</div>
				<div class='form_row'>
					<input type='hidden' name='emailed' />
					<input type='checkbox' name='emailed' />
					<label>
						<span>Email Sent</span>
						<div>
							<input type='date' name='date_emailed' placeholder='URL' value='".date("Y-m-d")."' />
						</div>
					</label>
				</div>
				<div class='form_row'>
					<label>
						<span>Reply Received</span>
						<input type='hidden' name='reply_recvd' value='off'>
						<input type='checkbox' name='reply_recvd' />
					</label>
				</div>
				<div class='form_row'>
					<textarea name='reply_notes' placeholder='Reply Notes'></textarea>
				</div>
				<div class='form_row'>
					<input type='submit' value='Add New Posting' />
				</div>
			</form>
			
		";
		
		return $str;
	}
	
}

?>