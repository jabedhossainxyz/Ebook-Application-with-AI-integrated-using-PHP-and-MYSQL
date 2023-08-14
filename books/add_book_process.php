<?php
session_start();
require_once '../database/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $published_year = $_POST['published_year'];

    $coverImage = $_FILES['cover'];
    $coverImageName = $coverImage['name'];
    $coverImageTmpName = $coverImage['tmp_name'];

    $coverImageData = file_get_contents($coverImageTmpName);

    $bookFile = $_FILES['book_file'];
    $bookFileName = $bookFile['name'];
    $bookFileTmpName = $bookFile['tmp_name'];

    move_uploaded_file($coverImageTmpName, "../uploads/covers/$coverImageName");

    // Insert book details into the database using prepared statement
    $insertQuery = "INSERT INTO books (title, author, description, cover_image, book_file, published_year, uploaded_time) VALUES (?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sssssb", $title, $author, $description, $coverImageData, $bookFileData, $published_year);

    if ($stmt->execute()) {
        header('Location: ../views/dashboard.php'); // Redirect after successful book addition
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
