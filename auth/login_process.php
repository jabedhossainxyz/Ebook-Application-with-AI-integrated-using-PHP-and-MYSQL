<?php
session_start();

require_once '../database/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `ebook`.`users` WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);
    $user = $result->fetch_assoc();

    if ($user) {
        $_SESSION['username'] = $username;
        header('Location: ../views/dashboard.php');
        exit();
    } else {
        header("Location: login.php?error=Invalid username or password");
        exit();
    }
}
