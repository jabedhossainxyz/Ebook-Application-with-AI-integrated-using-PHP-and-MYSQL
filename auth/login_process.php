<?php
session_start();

// Simulated user data (replace with database retrieval)
$validUsername = 'exampleuser';
$validPassword = password_hash('examplepassword', PASSWORD_DEFAULT);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $validUsername && password_verify($password, $validPassword)) {
        $_SESSION['username'] = $username;
        header('Location: dashboard.php'); // Redirect to dashboard or another page
        exit();
    } else {
        header('Location: login.php?error=1'); // Redirect back to login with error flag
        exit();
    }
}
