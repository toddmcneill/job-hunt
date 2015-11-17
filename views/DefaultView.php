<?php

class DefaultView extends View {
	
	protected function getPageTitle() {
		return '';
	}
	
	protected function getPageContent() {
		$str = "
			<a href='/posting'>Add a new posting</a>
			
		";
		
		return $str;
	}
	
}

?>