<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

?>


<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="../style/style.css">
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

        <form class="login-container" action="login_process.php" method="POST">
                <h2 class="text-center mb-4">Login</h2>
                <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="button-group">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <button type="reset" class="btn btn-warning">Clear</button>
                </div>

                <p class="center-text">Doesn't have an account? <a href="register.php">Register</a></p>
        </form>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>