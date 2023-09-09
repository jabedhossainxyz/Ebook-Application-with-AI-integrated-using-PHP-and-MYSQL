<?php
require './database/connect.php';

// Fetch an example book cover image (replace 1 with an actual book ID)
$bookId = 12;
$sql = "SELECT * FROM `ebook`.`books` WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $bookId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $book = $result->fetch_assoc();
    $imageData = $book['cover_image'];
    $imageFormat = 'image/jpeg'; // Adjust this based on the actual format
    $base64Image = 'data:' . $imageFormat . ';base64,' . base64_encode($imageData);
    echo $base64Image;
} else {
    echo 'Book not found.';
}

$conn->close();
