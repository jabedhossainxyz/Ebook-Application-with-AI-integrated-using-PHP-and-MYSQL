<?php
session_start();
include '../database/connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
    exit;
}

$username = $_SESSION['username'];

// Fetch user information including the profile picture based on the logged-in username
$sql = "SELECT * FROM `ebook`.`users` WHERE username=?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo "Prepare failed: " . $conn->error;
    exit;
}

$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Retrieve the profile picture data
    $profilePictureData = $user['profile_picture'];
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Profile</title>

    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .btn-primary {
            margin-top: 20px;
        }

        .profile-pic {
            max-width: 150px;
            max-height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <?php
        if ($profilePictureData) {
            echo '<img class="profile-pic" src="data:image/png;base64,' . base64_encode($profilePictureData) . '" alt="Profile Picture">';
        } else {
            echo 'Profile Picture Not Available';
        }
        ?>
        <img class="profile-pic" src="data:image/png;base64,<?php echo base64_encode($profilePictureData); ?>" alt="Profile Picture">

        <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
        <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
        <p><strong>Mobile:</strong> <?php echo $user['mobile']; ?></p>
        <div class="w-50">
            <a class="btn btn-primary" href="../views/dashboard.php">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>
    </div>

</body>

</html>