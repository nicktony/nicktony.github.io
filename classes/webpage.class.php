<?php

	class webpage {
		
		function __construct() {
			$this->createHeader();
		}

		function createHeader()
		{
			$html = file_get_contents('../navigation/navigation.html');
			echo $html;
		}
	}
?>