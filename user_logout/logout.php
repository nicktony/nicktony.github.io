<?php

// Start saved session
session_start();

// Remove all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect user to login screen
header("Location: ../user_login/login.php");

?>