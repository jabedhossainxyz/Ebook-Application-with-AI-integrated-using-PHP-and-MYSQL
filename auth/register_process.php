<?php
require '../database/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $mobile = $_POST['mobile'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Check if email already exists
        $emailExistsQuery = "SELECT * FROM `ebook`.`users` WHERE email = '$email'";
        $emailExistsResult = $conn->query($emailExistsQuery);

        if ($emailExistsResult && $emailExistsResult->num_rows > 0) {
                header('Location: register.php?error=email_exists'); // Redirect with error flag
                exit();
        }

        // Insert user data into the database (replace with prepared statements)
        $sql = "INSERT INTO `ebook`.`users` (name, email, username, mobile, password) VALUES ('$name', '$email', '$username', '$mobile', '$password')";

        if ($conn->query($sql) === TRUE) {
                header('Location: login.php'); // Redirect to login after successful registration
                exit();
        } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
}
