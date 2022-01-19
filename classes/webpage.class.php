<?php

class webpage {
	
	public $html_path;
	public $css_path;
	public $css_path2;
	public $html;

	function __construct($path = '') {
		if (file_exists($path)) {
			// Setup page w/o navigation sidebar (specified within code)
			$this->html_path = $path; // Grab .html template
			$this->css_path = str_replace('.html', '.css', $path); // Grab .css template (works with same folder as html)
			
			// Grab html
			$this->html = file_get_contents($path);

			// Replace .css path that links to .html
			$this->html = str_replace('#css_path#', $this->css_path, $this->html);
		} else {
			// Setup page w/ navigation sidebar
			$this->html_path = '../navigation/navigation.html'; // Grab .html template
			$this->css_path = str_replace('.html', '.css', $this->html_path); // Grab .css template
			
			// Grab html
			$this->html = file_get_contents($this->html_path);

			// Replace .css path that links to .html
			$this->html = str_replace('#css_path#', $this->css_path, $this->html);
		}
	}

	function createPage($title = '') {
		$this->html = str_replace('#TITLE#', $title, $this->html);
	}

	function inputHTML ($input = '') {
		$this->html = str_replace('#html_main#', $input, $this->html);
	}

	function inputCSS ($input = '') {
		$this->css_path2 = $input;
		$this->html = str_replace('#css_path2#', $input, $this->html);
	}

	function convert($inputName = '', $input = '') {
		$this->html = str_replace('#' . $inputName . '#', $input, $this->html);
	}

	function printPage() {
		echo $this->html;
	}
}

?>