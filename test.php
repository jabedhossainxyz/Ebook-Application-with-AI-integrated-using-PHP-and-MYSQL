<div class="book-details">
    <?php
    // Display the book cover image if available
    if ($book['cover_image']) {
        $imageData = $book['cover_image'];
        $imageFormat = 'image/png'; // Change this to 'image/jpeg' if the image format is JPEG
        $base64Image = 'data:' . $imageFormat . ';base64,' . base64_encode($imageData);
        echo '<img src="' . $base64Image . '" alt="' . $book['title'] . '" class="book-cover">';
    } else {
        echo '<p>No cover image available</p>';
    }
    ?>
    <h1><?php echo $book['title']; ?></h1>
    <p><?php echo $book['author']; ?></p>
    <p>Published Year: <?php echo $book['published_year']; ?></p>
    
    <!-- Add a button to initiate the PDF download -->
    <a class="btn btn-primary" href="download_pdf.php?id=<?php echo $book['id']; ?>">Download PDF</a>
    
    <a class="btn btn-primary" href="../views/dashboard.php">Back to Dashboard</a>
</div>
