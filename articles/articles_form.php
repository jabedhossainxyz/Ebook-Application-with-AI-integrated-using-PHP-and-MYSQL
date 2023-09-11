<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Article</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
        <style>
                h1 {
                        text-align: center;
                }

                form {
                        display: contents;
                }
        </style>
</head>

<body>
        <div class="container">
                <h1 class="mt-5">Create Article</h1>
                <div class="form-container mt-4">
                        <form action="create_article.php" method="POST">
                                <div class="mb-3">
                                        <label for="title" class="form-label">Title:</label>
                                        <input type="text" id="title" name="title" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                        <label for="content" class="form-label">Content:</label>
                                        <textarea id="content" name="content" class="form-control" rows="4" required></textarea>
                                </div>

                                <div class="mb-3 form-check">
                                        <input type="checkbox" id="is_private" name="is_private" class="form-check-input">
                                        <label for="is_private" class="form-check-label">Make Article Private</label>
                                </div>

                                <button type="submit" class="btn btn-primary">Create Article</button>
                        </form>
                </div>
        </div>

        <!-- Add Bootstrap JS scripts here if needed -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>