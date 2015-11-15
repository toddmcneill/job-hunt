<?php

abstract class View {
	
	private
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
		$str = "Default Header";
		return $str;
	}
	
	// Returns a string that contains the page footer content.
	protected function getFooterContent() {
		$str = "Default Footer";
		return $str;
	}
	
	
	
	// ===============
	// Class Functions
	// ===============
	
		
	// This is the main function where the entire page is assembled.
	final public function getViewContents() {
		$str = "
			<!DOCTYPE html>
			<html>
				<head>
					<title>
						".$this->getPageTitle()."
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
					".$this->getBodyContent()."
				</body>
			</html>
		";
		
		return $str;
	}
	
	// Returns a string containing content to put in the head tag. (js and stylesheet includes, etc.)
	final private function getHeadContent() {
		$str = '';
		
		// Include jquery on all pages.
		$this->addJavascript('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js');
		
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
				".$this->getHeaderContent()."
			</div>
			<div class='page_content'>
				".$this->getPageContent()."
			</div>
			<div class='footer_content'>
				".$this->getFooterContent()."
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
	
}

?>