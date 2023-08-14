<?php
require '../database/connect.php';

if (isset($_GET['error']) && $_GET['error'] === 'email_exists') {
        echo '<div class="alert alert-danger">Email already exists. Please use a different email.</div>';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="../style/style.css">
        <title>Registration Page</title>

        <style>
                body {
                        background-color: #f8f9fa;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        height: 75vh;
                }

                .is-invalid {
                        border-color: red !important;
                }

                .registration-container label,
                .registration-container input,
                .registration-container small,
                .registration-container .btn {
                        font-size: 14px;
                }
        </style>
</head>

<body>
        <form class="registration-container" action="register_process.php" method="POST" onsubmit="return validateForm()">
                <h2 class="text-center mb-4">Registration</h2>
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
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Your email won't be shared.</div>
                </div>
                <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" required>
                </div>
                <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div id="passwordHelp" class="form-text text-danger" style="display: none;">Password must be at least 8 characters long.</div>
                </div>

                <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        <div id="passwordMatchHelp" class="form-text text-danger" style="display: none;">Passwords must match.</div>
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
                <p>Already have an account? <a href="login.php">Login</a></p>
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
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>