<?php

class IndexView extends View {
	
	protected function getPageTitle() {
		return '';
	}
	
	protected function getPageContent() {
		$str = "
			<div>
				<a href='/posting/addNew'>Add a New Posting</a>
			</div>
			<br />
			<div>
				<a href='/posting/listAll'>View All Postings</a>
			</div>
			
		";
		
		return $str;
	}
	
}

?>