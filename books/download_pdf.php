<?php
require '../database/connect.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $bookId = $_GET['id'];

    // Fetch the book details from the database
    $sql = "SELECT * FROM `books` WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $bookId); // Bind the parameter
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo 'Book not found.';
        exit();
    }

    $book = $result->fetch_assoc();

    // Retrieve the PDF content from the database
    $pdfData = $book['book_file'];
    $pdfFileName = $book['title'] . '.pdf';

    // Save the PDF content to a temporary file
    $tempPdfFilePath = tempnam(sys_get_temp_dir(), 'ebook_');
    file_put_contents($tempPdfFilePath, $pdfData);

    // Set headers for download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $pdfFileName . '"');
    header('Content-Length: ' . filesize($tempPdfFilePath));
    header('Cache-Control: must-revalidate');
    header('Pragma: public');

    // Output the PDF data
    readfile($tempPdfFilePath);
    exit();
} else {
    echo 'Invalid book ID.';
    exit();
}
