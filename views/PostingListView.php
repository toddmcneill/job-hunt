<?php

class PostingListView extends View {
	
	protected function getPageTitle() {
		$str = 'Posting List';
		return $str;
	}
	
	protected function getPageContent() {
		$str = "
			<h2>Posting List</h2>
			<ul>
		";
		// Display each posting.
		foreach ($this->data['postings'] as $posting) {
			$str .= "
				<li>
					<div>
						<a href='/posting/viewPosting/postingId/".$posting->getId()."'>
							<span>".HTML::encodeOutput($posting->getCompany())."</span>
							-
							<span>".HTML::encodeOutput($posting->getJobTitle())."</span>
						</a>
					</div>
					<div>
						<a href=".HTML::encodeAttr($posting->getUrl()).">".HTML::encodeOutput($posting->getUrl())."</a>
					</div>
					<div>
						<a href=''></a>
					</div>
					<div>
						<a href=''></a>
					</div>
				</li>
			";
		}
		
		$str .= "
			</ul>
		";
		
		return $str;
	}
	
}

?>