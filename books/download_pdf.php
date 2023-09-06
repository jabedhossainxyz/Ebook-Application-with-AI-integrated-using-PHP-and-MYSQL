<?php
session_start();
require '../database/connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
    exit;
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $bookId = $_GET['id'];

    // Fetch the PDF content based on the book ID from the database
    $sql = "SELECT * FROM `books` WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $bookId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo 'Book not found.';
        exit();
    }

    $book = $result->fetch_assoc();

    $pdfData = $book['book_file'];
    $filename = $book['title'] . '.pdf';

    // Set headers for download
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . strlen($pdfData));

    // Output the PDF data
    echo $pdfData;
    exit();
} else {
    echo 'Invalid book ID.';
    exit();
}
