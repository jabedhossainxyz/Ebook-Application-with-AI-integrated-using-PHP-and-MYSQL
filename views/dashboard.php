<?php
require '../database/connect.php';
?>


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

                .dashboard-container {
                        padding: 20px;
                }

                .widget-card {
                        background-color: #fff;
                        border-radius: 10px;
                        padding: 20px;
                        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                        margin-bottom: 20px;
                }

                .widget-title {
                        font-size: 18px;
                        margin-bottom: 10px;
                }

                .chart-container {
                        height: 300px;
                        /* Adjust the height based on your chart data */
                }

                .footer {
                        background-color: #333;
                        color: #fff;
                        text-align: center;
                        padding: 10px;
                }

                .book-cover-image {
                        max-width: 150px;
                        /* Adjust the value to your preference */
                        height: auto;
                        margin-bottom: 10px;
                }

                .books-container {
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: space-between;
                }

                .book-cards {
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: space-between;
                }

                .book-card {
                        flex: 0 0 calc(33.33% - 10px);
                        /* Adjust the width as needed */
                        margin-bottom: 20px;
                        padding: 10px;
                        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
                }

                .book-cover-image {
                        max-width: 100%;
                        height: auto;
                        margin-bottom: 10px;
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
                                                <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" href="../books/add_books.php">Add Books</a>
                                        </li>

                                </ul>
                                <ul class="navbar-nav ml-auto">
                                        <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Profile
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                                        <li><a class="dropdown-item" href="../profile/view_profile.php">Profile</a></li>
                                                        <li class="nav-item">
                                                                <a class="nav-link" href="../profile/change_password_modal.php" data-bs-toggle="modal" data-bs-target="#changePasswordModal">Change Password</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="../auth/logout.php">Logout</a></li>
                                                </ul>
                                        </li>
                                </ul>

                        </div>
                </div>
        </nav>

        <div class="dashboard-container">
                <div class="widget-card">
                        <h3 class="widget-title">AI Recommendations</h3>
                        <div class="recommendations-container" id="recommendations">
                                <!-- Recommendations will be displayed here -->
                        </div>
                </div>
                <div class="widget-card">
                        <h3 class="widget-title">Free Books</h3>
                        <div class="books-container">
                                <?php
                                $sql = "SELECT * FROM `ebook`.`books`";
                                $result = $conn->query($sql);
                                echo '<div class="book-cards">';
                                while ($row = $result->fetch_assoc()) {
                                        echo '<div class="book-card">';
                                        echo '<img class="book-cover-image" src="data:image/jpeg;base64,' . base64_encode($row['cover_image']) . '" alt="' . $row['title'] . '">';
                                        echo '<h4>' . $row['title'] . '</h4>';
                                        echo '<p>' . $row['author'] . '</p>';
                                        echo '<a class="btn btn-primary" href="../books/view_book.php?id=' . $row['id'] . '">View</a>';
                                        echo '<a class="btn btn-danger" href="../books/delete_books.php?id=' . $row['id'] . '">Delete</a>';
                                        echo '</div>';
                                }
                                echo '</div>';
                                $conn->close();
                                ?>
                        </div>
                        <div class="row">
                                <div class="col-lg-6">
                                        <div class="widget-card">
                                                <h3 class="widget-title">Reading Overview</h3>
                                                <div class="chart-container">
                                                        <!-- Insert your chart here -->
                                                </div>
                                        </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="widget-card">
                                                <h3 class="widget-title">User Statistics</h3>
                                                <div class="chart-container">
                                                        <!-- Insert another chart here -->
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>

                <footer class="footer">
                        &copy; 2023 E-Book Application. All rights reserved. <a href="https://www.linkedin.com/in/jabedhossain">Jabed Hossain</a>
                </footer>

                <script>
                        // Simulated AI-generated recommendations
                        const recommendations = [{
                                        title: "Book Title 1",
                                        author: "Author 1"
                                },
                                {
                                        title: "Book Title 2",
                                        author: "Author 2"
                                },
                                {
                                        title: "Book Title 3",
                                        author: "Author 3"
                                }

                        ];


                        function renderRecommendations() {
                                const recommendationsContainer = document.getElementById("recommendations");
                                recommendationsContainer.innerHTML = "";

                                recommendations.forEach(recommendation => {
                                        const recommendationCard = document.createElement("div");
                                        recommendationCard.classList.add("recommendation-card");
                                        recommendationCard.innerHTML = `
                <h4>${recommendation.title}</h4>
                <p>Author: ${recommendation.author}</p>
            `;

                                        recommendationsContainer.appendChild(recommendationCard);
                                });
                        }

                        // Call the function to render recommendations on page load
                        window.addEventListener("load", renderRecommendations);
                </script>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>

</html>