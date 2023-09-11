<?php
session_start();
require_once '../database/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id']; // Assuming you have stored the user's ID in the session.
    $title = $_POST['title'];
    $content = $_POST['content'];
    $is_private = isset($_POST['is_private']) ? 1 : 0; // Check if the checkbox is checked.

    // Insert the article into the database.
    $query = "INSERT INTO articles (user_id, title, content, is_private) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("issi", $user_id, $title, $content, $is_private);
    
    if ($stmt->execute()) {
        // Article successfully created.
        header('Location: ../views/dashboard.php'); // Redirect to the articles page.
        exit();
    } else {
        echo "Error creating the article: " . $stmt->error;
    }
}

$conn->close();
