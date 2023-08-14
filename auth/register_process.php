<?php
require '../database/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // Check if email already exists
    $emailExistsQuery = "SELECT * FROM `ebook`.`users` WHERE email = '$email'";
    $emailExistsResult = $conn->query($emailExistsQuery);

    if ($emailExistsResult && $emailExistsResult->num_rows > 0) {
        header('Location: register.php?error=email_exists');
        exit();
    }

    // Insert user data into the database
    $insertQuery = "INSERT INTO `ebook`.`users` (name, email, username, mobile, password) VALUES ('$name', '$email', '$username', '$mobile', '$password')";

    if ($conn->query($insertQuery) === TRUE) {
        header('Location: login.php');
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
