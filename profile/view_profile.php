<?php
session_start();

include '../database/connect.php';

if (!isset($_SESSION['user_id'])) {
        header("Location: ../auth/login.php");
        exit;
}

$userID = $_SESSION['user_id'];

$sql = "SELECT * FROM `ebook`.`users` WHERE id=?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
        echo "Prepare failed: " . $conn->error;
        exit;
}

$stmt->bind_param('i', $userID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
} else {
        echo 'User not found.';
        exit();
}

$stmt->close();
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
</head>

<body>
        <div class="container mt-5">
                <h2>Profile Information</h2>
                <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
                <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
                <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                <p><strong>Mobile:</strong> <?php echo $user['mobile']; ?></p>
                <a class="btn btn-primary" href="../views/dashboard.php">Back to Dashboard</a>
        </div>
</body>

</html>