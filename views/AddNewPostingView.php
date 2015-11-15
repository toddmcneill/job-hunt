<?php

class AddNewPostingView extends View {
	
	protected function getPageTitle() {
		$str = 'Job Hunt | Add New Posting';
	}
	
	protected function getPageContent() {
		$str = "
			<h2>Add New Posting</h2>
			
			<form action='index.php/posting/addNew' method='post'>				
				<div>
					<input type='text' name='url' placeholder='URL' />
				</div>
				<div>
					<input type='text' name='company' placeholder='Company' />
				</div>
				<div>
					<input type='text' name='job_title' placeholder='Job Title' />
				</div>
				<div>
					<textarea name='job_descr' placeholder='Job Description'></textarea>
				</div>
				<div>
					<textarea name='job_notes' placeholder='Job Notes'></textarea>
				</div>
				<div>
					<label for='rating'>Rating</label>
					<input type='range' name='rating' id='rating' min='1' max='5' value='3' />
				</div>
				<div>
					<input type='hidden' name='emailed' />
					<input type='checkbox' name='emailed' />
					<input type='text' name='date_emailed' placeholder='URL' value='".date("Y-m-d")."' />
				</div>
				<div>
					<label for='reply_recvd'>Reply Received</label>
					<input type='hidden' name='reply_recvd' value='off'>
					<input type='checkbox' name='reply_recvd' id='reply_recvd' />
				</div>
				<div>
					<textarea name='reply_notes' placeholder='Reply Notes'></textarea>
				</div>
				<input type='submit' value='Add New Posting' />	
			</form>
			
		";
		
		return $str;
	}
	
}

?>