<?php
	
// Required files
require '../classes/webpage.class.php';

// Create webpage
$webpage = new webpage('./login.html');

// Redirect if session is already started
session_start(); 
if (isset($S_SESSION['username'])) {
	header("Location: ../home/home.php");
}

// Check for username and password input
if (!empty($_POST['username'])) $user = $_POST['username'];
if (!empty($_POST['password'])) $pass = $_POST['password'];

if (!empty($user) && !empty($pass))
{
	// Initialize DB connection variables
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "taskless";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		exit;
	}

	// Search for user in DB, activate session if found
	$sql = "SELECT 1 FROM users WHERE username = '$user' && password = '$pass'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		$_SESSION['loggedin'] = true;
		$_SESSION['username'] = $user;
		$conn->close(); //close db connection
	}

	// Redirect to home if loggin in
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	    header("Location: ../home/home.php");
	} else {
	    //echo "Please log in first to see this page.";
	}
}

// Output webpage
$webpage->printPage();

?>