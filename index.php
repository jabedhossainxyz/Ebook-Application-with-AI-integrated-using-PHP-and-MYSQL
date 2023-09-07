<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E-Book</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <style>
                .navbar {
                        background-color: #333;
                }

                .navbar-nav {
                        margin-left: auto;
                }

                .nav-link:hover {
                        color: #ddd;
                }

                img {
                        display: block;
                        margin: 70px auto;
                }
        </style>
</head>

<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                        <li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" href="./contact/contact.php">Contact</a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" href="./contact/about.php">About Us</a>
                                        </li>
                                </ul>
                                <ul class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                                <a class="nav-link" href="./auth/login.php">Login</a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" href="./auth/register.php">Registration</a>
                                        </li>
                                </ul>
                        </div>
                </div>
        </nav>

        <img src="img/banner.png" alt="banner">


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>