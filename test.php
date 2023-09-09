<?php
require './database/connect.php';

// Fetch an example book cover image (replace 1 with an actual book ID)
$bookId = 12; // Replace with the desired book ID
$sql = "SELECT * FROM `ebook`.`books` WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $bookId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $book = $result->fetch_assoc();
    
    // Check if cover_image column is not empty
    if (!empty($book['cover_image'])) {
        $imageData = $book['cover_image'];
        $imageFormat = 'image/jpeg'; // Adjust this based on the actual image format
        
        // Set the appropriate content type header
        header('Content-Type: ' . $imageFormat);
        
        // Display the image
        echo $imageData;
    } else {
        echo 'No cover image available for book with ID ' . $bookId;
    }
} else {
    echo 'Book not found.';
}

$conn->close();
