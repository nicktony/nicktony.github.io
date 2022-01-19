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
$webpage->createPage('Schedule');

// Set default time zone
date_default_timezone_set('America/New_York');

// Calculate dates for calender
$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d h:i:s');
$prev_date = date('Y-m-d h:i:s', strtotime($date .' -1 day'));
$next_date = date('Y-m-d h:i:s', strtotime($date .' +1 day'));

$month = date('m');
$month_string = date('F');
$day = date('d');
$maxDate = getMaxDate($month);
$year = date('Y');

// Generate calender
$html = 
"
	<div class='month'>
	  <ul>
	    <li class='prev'>&#10094;</li>
	    <li class='next'>&#10095;</li>
	    <li>$month_string<br><span style='font-size:18px'>$year</span></li>
	  </ul>
	</div>

	<ul class='weekdays'>
	  <li>Mo</li>
	  <li>Tu</li>
	  <li>We</li>
	  <li>Th</li>
	  <li>Fr</li>
	  <li>Sa</li>
	  <li>Su</li>
	</ul>

	<ul class='days'>
";

for ($i = 1; $i <= $maxDate; $i++) {
	$html .= "<li>$i</li>";
}
$html .= "</ul>";






















// Input additional css
$webpage->inputCSS('./schedule.css');

// Input html body contents in template
$webpage->inputHTML($html);

// Output webpage
$webpage->printPage();








/*
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		exit;
	}
	
	// Start of program
	$sql = "INSERT INTO users (id, username, password) VALUES (1, 'nick', 'admin')";
	//$result = $conn->query($sql);

	$conn->close();
	

	$html = "
			<!DOCTYPE html>
			<html>
			<head>
			<meta name='viewport' content='width=device-width, initial-scale=1.0'>
				</head>
				<body>

				<h2>Setting the Viewport</h2>
				<p>This example does not really do anything, other than showing you how to add the viewport meta element.</p>

			</body>
			</html>
			";

	echo $html;

	$html = file_get_contents('./login.html', TRUE);
	echo $html;



	/*$sql = "SELECT item FROM items WHERE something = something GROUP BY this";
	$result = @mysql_query($sql, $connection) or die ("Failed to Execute SQL: $sql");
	while ($val = @mysql_fetch_array($result)) {

	}*/





	/*if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/dashboard/');*/
	exit;
















	function getMaxDate($month) {
		$maxDates = array(
	    1 => 31,
	    2 => 28,
	    3 => 31,
	    4 => 30,
	    5 => 31,
	    6 => 30,
	    7 => 31,
	    8 => 31,
	    9 => 30,
	    10 => 31,
	    11 => 30,
	    12 => 31,
		);
		$month = str_replace(0,'',$month);

		return $maxDates[$month];
	}
?>