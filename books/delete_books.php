<?php
require '../database/connect.php';

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
    exit;
}

// Check if a book ID is provided through GET request
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $bookId = $_GET['id'];

    // Replace with your database connection code
    require_once '../database/connect.php';

    // Prepare and execute the delete query
    $deleteQuery = "DELETE FROM books WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);

    if ($stmt) {
        $stmt->bind_param('i', $bookId); // Bind the parameter as an integer
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            header('Location: ../views/dashboard.php'); // Redirect back to the dashboard after deletion
            exit();
        } else {
            echo 'Error deleting book';
        }

        $stmt->close();
    } else {
        echo 'Error preparing statement';
    }

    // Close the database connection
    $conn->close();
} else {
    echo 'Invalid book ID';
}
