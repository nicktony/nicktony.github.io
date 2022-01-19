<?php
	
// Required files
require '../classes/webpage.class.php';

// Create webpage
$webpage = new webpage('./new_user.html');

// Redirect if session is already started
session_start();
if (isset($S_SESSION['username'])) {
	header("Location: ../home/home.php");
	session_destroy();
}

// Check for username and password input
if (!empty($_POST['newusername'])) $user = $_POST['newusername'];
if (!empty($_POST['newpassword'])) $pass = $_POST['newpassword'];

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

	// Search for user in DB
	$sql = "SELECT 1 FROM users WHERE username = '$user' && password = '$pass'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo "<font style='color:red; font-size: 30px;'>Username already taken</font>";
		$conn->close(); // Close db connection
	} else {
		// Insert new user in DB
		$sql = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";
		$result = $conn->query($sql);
		header("Location: ../user_login/login.php");
		$conn->close(); // Close db connection
	}
}

// Output webpage
$webpage->printPage();

?>