<?php
session_start();
require '../database/connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
    exit;
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $bookId = $_GET['id'];

    // Fetch the PDF file path based on the book ID from the database
    $sql = "SELECT book_file, title FROM `books` WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $bookId);

    if (!$stmt->execute()) {
        echo 'Error executing the database query.';
        exit();
    }

    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo 'Book not found.';
        exit();
    }

    $book = $result->fetch_assoc();

    $pdfFilePath = $book['book_file'];
    $filename = $book['title'] . '.pdf';

    // Check if the file exists
    if (file_exists($pdfFilePath)) {
        // Set headers for download
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($pdfFilePath));

        // Output the PDF file
        readfile($pdfFilePath);
        exit();
    } else {
        echo 'PDF file not found.';
        exit();
    }
} else {
    echo 'Invalid book ID.';
    exit();
}
