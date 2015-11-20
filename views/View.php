<?php

abstract class View {
	
	private
		$data = array(),
		$css_includes = array(),
		$js_includes = array();
	
	// ==================
	// Abstract Functions
	// ==================
	
	
	// Returns a string containing the page title.
	protected abstract function getPageTitle();
	
	// Returns a string containing the main page content.
	protected abstract function getPageContent();
	
	
	
	// ===============================
	// Optionally Overridden Functions
	// ===============================
	
	
	// Returns a string containing page-specific css style rules.
	protected function getPageStyles() {
		return '';
	}
	
	// Returns a string containing page-specific javascript.
	protected function getPageJavascript() {
		return '';
	}

	// Returns a string that contains the page header content.
	protected function getHeaderContent() {
		return '';
	}
	
	// Returns a string that contains the page footer content.
	protected function getFooterContent() {
		return '';
	}
	
	
	
	// ===============
	// Class Functions
	// ===============
	
		
	// This is the main function where the entire page is assembled.
	final public function getViewContents($ob_contents = '') {
		$str = "
			<!DOCTYPE html>
			<html>
				<head>
					<title>
						".$this->getTitle()."
					</title>
					".$this->getHeadContent()."
					<style>
						".$this->getPageStyles()."
					</style>
					<script>
						".$this->getPageJavascript()."
					</script>
				</head>
				<body>
					".$ob_contents."
					<div class='body_content'>
						".$this->getBodyContent()."
					</div>
				</body>
			</html>
		";
		
		return $str;
	}
	
	// Returns a string containing content to put in the head tag. (js and stylesheet includes, etc.)
	final private function getHeadContent() {
		$str = '';
		
		// Include site javascript and css
		$this->includeSiteJavascriptAndCss();
		
		// Get the css includes.
		$str .= $this->getCssIncludes();
		
		// Get the javascript includes.
		$str .= $this->getJavascriptIncludes();
		
		return $str;
	}
	
	// Returns a string containing content to put in the body tag.
	final private function getBodyContent() {
		$str = "
			<div class='header_content'>
				".$this->getSiteHeaderContent()."
				".$this->getHeaderContent()."
			</div>
			<div class='page_content'>
				".$this->getPageContent()."
			</div>
			<div class='footer_content'>
				".$this->getFooterContent()."
				".$this->getSiteFooterContent()."
			</div>
		";
		return $str;
	}
	
	
	// Adds a css file, but ensures there is only one copy sharing the same key.
	final protected function addCss($key, $source) {
		$this->css_includes[$key] = $source;
	}
	
	// Adds a javascript file, but ensures there is only one copy sharing the same key.
	final protected function addJavascript($key, $source) {
		$this->js_includes[$key] = $source;
	}
	
	// Returns a string containing link tags for all css includes.
	final private function getCssIncludes() {
		$css_include_tags = array();
		foreach ($this->css_includes as $source) {
			$css_include_tags[] = "<link rel='stylesheet' href='".$source."'>";
		}
		return implode($css_include_tags);
	}
	
	// Returns a string containing script tags for all javascript includes.
	final private function getJavascriptIncludes() {
		$js_include_tags = array();
		foreach ($this->js_includes as $source) {
			$js_include_tags[] = "<script src='".$source."'></script>";
		}
		return implode($js_include_tags);
	}
	
	// Includes the site javascript and css files.
	final private function includeSiteJavascriptAndCss() {
		// Include jquery.
		$this->addJavascript('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js');
		
		// Include the system javascript and css files.
		$this->addJavascript('system', '/includes/system.js');
		$this->addCss('system', '/includes/system.css');		
	}
	
	// Returns the string that will be used in the title tag.
	final private function getTitle() {
		if ($this->getPageTitle() != '') {
			$str = $this->getPageTitle()." | ".$this->getSiteTitle();
		} else {
			$str = $this->getSiteTitle();
		}
		return $str;
	}
	
	// Returns the title of the site.
	final private function getSiteTitle() {
		return 'Job Hunt';
	}
	
	// Returns the header content for the site.
	final private function getSiteHeaderContent() {
		$str = "
			<h1>
				<a href='/'>Job Hunt</a>
			</h1>
		";
		return $str;
	}
	
	// Returns the header content for the site.
	final private function getSiteFooterContent() {
		$str = "
			Todd McNeill
		";
		return $str;
	}
	
}

?>