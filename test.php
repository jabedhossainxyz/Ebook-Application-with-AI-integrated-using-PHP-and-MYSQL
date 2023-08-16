<!-- ... Previous HTML code ... -->

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="mb-4">Get in Touch</h2>
            <?php
            if (isset($_GET['success']) && $_GET['success'] === 'true') {
                echo '<div class="alert alert-success" role="alert">';
                echo 'Thank you for your message! We will get back to you soon.';
                echo '</div>';
            }
            ?>
            <form action="contact_process.php" method="POST">
                <!-- ... Form fields ... -->
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </div>
</div>

<!-- ... Rest of the HTML code ... -->
