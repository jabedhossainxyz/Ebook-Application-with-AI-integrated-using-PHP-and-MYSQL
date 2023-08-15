<?php
session_start();
require_once '../database/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userID = $_SESSION['user_id'];
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Fetch user's current password from the database
    $sql = "SELECT password FROM `ebook`.`users` WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Prepare failed: " . $conn->error;
        exit();
    }

    $stmt->bind_param('i', $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $storedPassword = $user['password'];

        // Verify current password
        if ($currentPassword === $storedPassword) {
            // Update the password in the database
            $updateSql = "UPDATE `ebook`.`users` SET password = ? WHERE id = ?";
            $updateStmt = $conn->prepare($updateSql);

            if (!$updateStmt) {
                echo "Prepare failed: " . $conn->error;
                exit();
            }

            $updateStmt->bind_param('si', $newPassword, $userID);
            $updateStmt->execute();

            if ($updateStmt->affected_rows > 0) {
                $passwordChanged = true;
            } else {
                $passwordChanged = false;
            }

            $updateStmt->close();
        } else {
            $passwordMismatch = true;
        }
    } else {
        echo 'User not found.';
        exit();
    }

    $stmt->close();
    $conn->close();
}

header('Location: ../views/dashboard.php');
exit();
