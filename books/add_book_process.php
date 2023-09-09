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

    // Ensure unique filenames to prevent overwriting
    $coverImagePath = $uploadDirectory . "covers/" . uniqid() . "_" . $coverImageName;
    $bookFilePath = $uploadDirectory . "books/" . uniqid() . "_" . $bookFileName;

    if (move_uploaded_file($coverImageTmpName, $coverImagePath) && move_uploaded_file($bookFileTmpName, $bookFilePath)) {
        // Both files were successfully uploaded

        // Insert book details into the database using prepared statement
        $insertQuery = "INSERT INTO `ebook`.`books` (title, author, description, cover_image, book_file, published_year, uploaded_at) VALUES (?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssssss", $title, $author, $description, $coverImagePath, $bookFilePath, $published_year);

        if ($stmt->execute()) {
            header('Location: ../views/dashboard.php'); // Redirect after a successful book addition
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error uploading files.";
    }

    $conn->close();
}
