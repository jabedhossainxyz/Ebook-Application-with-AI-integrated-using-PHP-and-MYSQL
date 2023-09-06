<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Book</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <!-- Include jQuery UI CSS -->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <!-- Include jQuery and jQuery UI libraries -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
        <div class="container d-flex justify-content-center align-items-center vh-100">
                <div class="w-50">
                        <a class="btn btn-primary" href="../views/dashboard.php">
                                <i class="fas fa-arrow-left"></i> Back to Dashboard
                        </a>
                        <h1 class="text-center mb-4">Add Book</h1>
                        <form action="add_book_process.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                        <label for="title" class="form-label">Title:</label>
                                        <input type="text" name="title" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                        <label for="author" class="form-label">Author:</label>
                                        <input type="text" name="author" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                        <label for="description" class="form-label">Description:</label>
                                        <textarea name="description" class="form-control" required></textarea>
                                </div>
                                <div class="mb-3">
                                        <label for="published_year" class="form-label">Published Year:</label>
                                        <input type="text" id="published_year" name="published_year" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                        <label for="cover" class="form-label">Cover Image:</label>
                                        <input type="file" name="cover" class="form-control" accept="image/*" required>
                                        <img id="coverPreview" class="mt-2" style="max-width: 400px">
                                </div>
                                <div class="mb-3">
                                        <label for="book_file" class="form-label">Book File (PDF):</label>
                                        <input type="file" name="book_file" class="form-control" accept=".pdf" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Book</button>
                        </form>
                </div>
        </div>

        <script>
                $(document).ready(function() {
                        // Initialize the Datepicker on the "published_year" input field
                        $("#published_year").datepicker({
                                dateFormat: "yy-mm-dd", // Change the date format as needed
                                changeMonth: true,
                                changeYear: true
                        });
                });

                // Display image preview when a cover image is selected
                document.querySelector('input[name="cover"]').addEventListener('change', function(event) {
                        const coverPreview = document.getElementById('coverPreview');
                        coverPreview.src = URL.createObjectURL(event.target.files[0]);
                });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>