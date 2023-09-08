
<?php
include '../database/connect.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    if (isset($_FILES['profile_picture'])) {
        $profilePicture = $_FILES['profile_picture'];
        $profilePicturePath = 'profile_picture/' . uniqid() . "_" . $profilePicture['name'];
        move_uploaded_file($profilePicture['tmp_name'], $profilePicturePath);
    }
    $sql = "INSERT INTO `ebook`.`users` (name, username, email, mobile, password, profile_picture) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('ssssss', $name, $username, $email, $mobile, $password, $profilePicturePath);
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
?>