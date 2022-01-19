<?php

// Check if session exists
session_start();
if (isset($_SESSION['username'])) {
	$temp = $_SESSION['username'];
  //echo "<div style='margin-left: 5rem; padding: 1rem'>Session is active with $temp</div>";
} else {
	header("Location: ../user_login/login.php");
}

// Required files
require '../classes/webpage.class.php';

// Create webpage
$webpage = new webpage();

// Assign title
$webpage->createPage('Tasks');

// Assign body contents
$html = 'test'
					;























// Input additional css
$webpage->inputCSS('./tasks.css');

// Input html body contents in template
$webpage->inputHTML($html);

// Output webpage
$webpage->printPage();

exit;

?>