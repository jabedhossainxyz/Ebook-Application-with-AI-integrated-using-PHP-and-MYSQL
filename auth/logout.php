<?php
session_start(); // Start the session

// Clear all session data
session_unset();

// Destroy the session
session_destroy();

// Redirect to the index.php file
header("Location: ../views/index.php");
exit;
?>