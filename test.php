<!-- Display success or error message if present -->
<?php
if (!empty($success)) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        ' . $success . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
} elseif (!empty($error)) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="mr-2">&#9888;</span>' . $error . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>
