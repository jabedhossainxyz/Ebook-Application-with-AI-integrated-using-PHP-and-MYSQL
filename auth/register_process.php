<?php
require '../database/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Make sure to sanitize and validate user input before using it in queries
    $name = $_POST['name'];
    $username = $_POST['username'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // Check if the email key exists in the $_POST array
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        // Check if email already exists
        $emailExistsQuery = "SELECT * FROM `ebook`.`users` WHERE email = ?";
        $stmt = $conn->prepare($emailExistsQuery);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $emailExistsResult = $stmt->get_result();

        if ($emailExistsResult && $emailExistsResult->num_rows > 0) {
            header('Location: register.php?error=email_exists');
            exit();
        }

        // Insert user data into the database using prepared statement
        $insertQuery = "INSERT INTO `ebook`.`users` (name, email, username, mobile, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("sssss", $name, $email, $username, $mobile, $password);

        if ($stmt->execute()) {
            header('Location: login.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // Handle the case where the email key is missing in the $_POST array
        echo "Error: Email is missing in the form submission.";
    }

    $conn->close();
}
