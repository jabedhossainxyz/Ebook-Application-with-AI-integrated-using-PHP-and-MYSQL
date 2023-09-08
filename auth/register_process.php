<?php
include '../database/connect.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    if (isset($_FILES['profile_picture']) && !empty($_FILES['profile_picture']['tmp_name'])) {
        $profilePicture = file_get_contents($_FILES['profile_picture']['tmp_name']);
    } else {
        $profilePicture = null; // Set to null if no profile picture is uploaded
    }

    $sql = "INSERT INTO `ebook`.`users` (name, username, email, mobile, password, profile_picture) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('sssssb', $name, $username, $email, $mobile, $password, $profilePicture);
        if ($stmt->execute()) {
            // Registration successful, redirect to login.php
            header("Location: login.php");
            exit;
        } else {
            // Registration failed
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Prepare failed: " . $conn->error;
    }

    $conn->close();
}
