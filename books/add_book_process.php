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

    $bookFile = $_FILES['book_file'];
    $bookFileName = $bookFile['name'];
    $bookFileTmpName = $bookFile['tmp_name'];

    // Upload cover image and book file to a directory
    $uploadDirectory = "../uploads/";
    move_uploaded_file($coverImageTmpName, $uploadDirectory . "covers/" . $coverImageName);
    move_uploaded_file($bookFileTmpName, $uploadDirectory . "books/" . $bookFileName);

    // Store file paths in the database
    $coverImagePath = "uploads/covers/" . $coverImageName;
    $bookFilePath = "uploads/books/" . $bookFileName;

    // Insert book details into the database using prepared statement
    $insertQuery = "INSERT INTO `ebook`.`books` (title, author, description, cover_image, book_file, published_year, uploaded_at) VALUES (?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ssssss", $title, $author, $description, $coverImagePath, $bookFilePath, $published_year);

    if ($stmt->execute()) {
        header('Location: ../views/dashboard.php'); // Redirect after successful book addition
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
