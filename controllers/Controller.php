<?php

abstract class Controller {
	
	protected
		$view = null;
	
	// The default action if none is specified.
	public abstract function defaultAction($params);
	
	// Displays the view.
	public function display() {
		// Check if a view has been set.
		if (!is_null($this->view)) {
			// Print the view.
			echo $this->view->getViewContents();
		}
	}
	
}

?>