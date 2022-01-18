<?php
	

	require './webpage.class.php';


	// Initialize DB connection variables
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "taskless";


		$webpage = new webpage();

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
?>
Something is wrong with the XAMPP installation :-(
