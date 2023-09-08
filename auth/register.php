<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <title>Registration Page</title>

        <style>
                body {
                        background-color: #f8f9fa;
                        align-items: center;
                        justify-content: center;
                        height: 75vh;
                }

                .navbar {
                        background-color: #333;
                }

                .navbar-nav {
                        margin: auto;
                }

                .nav-link:hover {
                        color: #ddd;
                }

                .profile-pic-preview {
                        max-width: 100px;
                        margin-left: 180px;
                        object-fit: cover;
                }
        </style>

</head>

<body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                        <li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="../views/index.php">Home</a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" href="../contact/contact.php">Contact</a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" href="../contact/about.php">About Us</a>
                                        </li>
                                </ul>
                        </div>
                </div>
        </nav>
        <form class="registration-container" action="register_process.php" method="POST" onsubmit="return validateForm()" enctype="multipart/form-data">
                <h3 class="text-center mb-2">Registration</h3>

                <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Your email won't be shared.</div>
                </div>
                <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" required>
                </div>
                <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div id="passwordHelp" class="form-text text-danger" style="display: none;">Password must be at least 8
                                characters long.</div>
                </div>

                <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        <div id="passwordMatchHelp" class="form-text text-danger" style="display: none;">Passwords must match.</div>
                </div>
                <div class="mb-3">
                        <label for="profile_picture" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" id="profile_picture" name="profile_picture" required onchange="previewImage(this)">
                </div>
                <div class="mb-3" id="image-preview-container" style="display: none;">
                        <img id="image-preview" class="profile-pic-preview" alt="Profile Image Preview">
                </div>
                <div class="button-group">
                        <button type="submit" class="btn btn-primary">Register</button>
                        <button type="reset" class="btn btn-warning">Clear</button>
                </div>

                <p class="center-text">Already have an account? <a href="login.php">Login</a></p>
        </form>

        <script>
                function validateForm() {
                        const passwordInput = document.getElementById('password');
                        const confirmInput = document.getElementById('confirm_password');
                        const passwordHelp = document.getElementById('passwordHelp');
                        const passwordMatchHelp = document.getElementById('passwordMatchHelp');

                        if (passwordInput.value.length < 8) {
                                passwordHelp.style.display = 'block';
                                passwordInput.classList.add('is-invalid');
                                return false; // Prevent form submission
                        } else {
                                passwordHelp.style.display = 'none';
                                passwordInput.classList.remove('is-invalid');
                        }

                        if (passwordInput.value !== confirmInput.value) {
                                passwordMatchHelp.style.display = 'block';
                                confirmInput.classList.add('is-invalid');
                                return false; // Prevent form submission
                        } else {
                                passwordMatchHelp.style.display = 'none';
                                confirmInput.classList.remove('is-invalid');
                        }

                        return true; // Allow form submission
                }

                // Function to preview the selected image
                function previewImage(input) {
                        const imagePreview = document.getElementById('image-preview');
                        const imagePreviewContainer = document.getElementById('image-preview-container');

                        if (input.files && input.files[0]) {
                                const reader = new FileReader();

                                reader.onload = function(e) {
                                        imagePreview.src = e.target.result;
                                        imagePreviewContainer.style.display = 'block';
                                };

                                reader.readAsDataURL(input.files[0]);
                        }
                }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>