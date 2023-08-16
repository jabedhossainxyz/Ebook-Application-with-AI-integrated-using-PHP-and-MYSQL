<?php
session_start();

require_once '../database/connect.php';

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $currentPassword = $_POST['current_password'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        // Get user's current password from the database
        $username = $_SESSION['username'];
        $query = "SELECT password FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if (!$user || $user['password'] !== $currentPassword) {
                $error = "Invalid current password.";
        } elseif ($newPassword === $currentPassword) {
                $error = "New password can't be the same as the current password.";
        } elseif ($newPassword !== $confirmPassword) {
                $error = "New password and confirm password didn't match.";
        } else {
                // Update user's password in the database
                $query = "UPDATE users SET password = ? WHERE username = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ss", $newPassword, $username);
                $stmt->execute();

                $success = "Password changed successfully!";
        }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Change Password</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                        <a class="navbar-brand" href="#">Change Password</a>
                </div>
        </nav>

        <div class="container mt-5">
                <div class="row">
                        <div class="col-md-6 offset-md-3">
                                <h2>Change Password</h2>

                                <!-- Display success or error message if present -->
                                <?php
                                if (!empty($success)) {
                                        echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
                                } elseif (!empty($error)) {
                                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                                }
                                ?>

                                <!-- Add the form for changing the password -->
                                <form action="change_password_process.php" method="POST">
                                        <div class="mb-3">
                                                <label for="current_password" class="form-label">Current Password</label>
                                                <input type="password" class="form-control" id="current_password" name="current_password" required>
                                        </div>
                                        <div class="mb-3">
                                                <label for="new_password" class="form-label">New Password</label>
                                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                                        </div>
                                        <div class="mb-3">
                                                <label for="confirm_password" class="form-label">Confirm New Password</label>
                                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                </form>
                        </div>
                </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>