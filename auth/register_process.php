<?php
include '../database/connect.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $profilePicturePath = ""; // Initialize the profile picture path

    if (isset($_FILES['profile_picture']) && !empty($_FILES['profile_picture']['tmp_name'])) {
        $profilePictureTmpName = $_FILES['profile_picture']['tmp_name'];
        $profilePictureName = $_FILES['profile_picture']['name'];

        // Define the upload directory and move the uploaded file
        $uploadDirectory = "../uploads/profile_pictures/";
        $profilePicturePath = $uploadDirectory . $profilePictureName;

        if (move_uploaded_file($profilePictureTmpName, $profilePicturePath)) {
            // File uploaded successfully, continue with database insertion
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `ebook`.`users` (name, username, email, mobile, password, profile_picture) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                $stmt->bind_param('ssssss', $name, $username, $email, $mobile, $hashedPassword, $profilePicturePath);
                if ($stmt->execute()) {
                    header("Location: login.php");
                    exit;
                } else {
                    echo "Error: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Prepare failed: " . $conn->error;
            }
        } else {
            echo "Error uploading profile picture.";
        }
    } else {
        // No profile picture uploaded, set the path to an empty string
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `ebook`.`users` (name, username, email, mobile, password, profile_picture) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param('ssssss', $name, $username, $email, $mobile, $hashedPassword, $profilePicturePath);
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
    }

    $conn->close();
}
