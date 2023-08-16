<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                        <a class="navbar-brand" href="#">Contact Us</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                                <a class="nav-link" href="../views/index.php">Home</a>
                                        </li>
                                        <li class="nav-item active">
                                                <a class="nav-link" href="about.php">About Us</a>
                                        </li>
                                </ul>
                        </div>
                </div>
        </nav>

        <div class="container mt-5">
                <div class="row">
                        <div class="col-md-6 offset-md-3">
                                <h2 class="mb-4">Get in Touch</h2>
                                <form action="contact_process.php" method="POST">
                                        <div class="mb-3">
                                                <label for="name" class="form-label">Your Name</label>
                                                <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="mb-3">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                        <div class="mb-3">
                                                <label for="message" class="form-label">Message</label>
                                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Send Message</button>
                                </form>
                        </div>
                </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>