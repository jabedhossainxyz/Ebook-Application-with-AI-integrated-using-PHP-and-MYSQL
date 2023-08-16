<?php
session_start();

require_once '../database/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    $username = $_SESSION['username'];
    $query = "SELECT password FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Clear any existing alert messages from the session
    unset($_SESSION['success']);
    unset($_SESSION['error']);

    if (!$user || $user['password'] !== $currentPassword) {
        $_SESSION['error'] = "Invalid current password.";
    } elseif ($newPassword === $currentPassword) {
        $_SESSION['error'] = "New password can't be the same as the current password.";
    } elseif ($newPassword !== $confirmPassword) {
        $_SESSION['error'] = "New password and confirm password didn't match.";
    } else {
        $query = "UPDATE users SET password = ? WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $newPassword, $username);
        $stmt->execute();

        $_SESSION['success'] = "Password changed successfully!";
    }

    // Redirect to the change password page after processing
    header("Location: change_password.php");
    exit();
}
