<?php
session_start();
require_once '../database/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Using prepared statement to prevent SQL injection
    $query = "SELECT * FROM `ebook`.`users` WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header('Location: ../views/dashboard.php');
        exit();
    } else {
        $_SESSION['login_error'] = "Invalid username or password";
        header("Location: login.php");
        exit();
    }
}

$conn->close();
