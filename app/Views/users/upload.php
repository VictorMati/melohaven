<!-- upload.php -->

<?php
// Include the necessary configuration and functions
require_once("path/to/config.php");
require_once("path/to/Functions.php");

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: ?page=login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Song - MeloHaven</title>
    <link rel="stylesheet" href="/public/css/Upload.css">
    <!-- Add your CSS stylesheets here -->
</head>

<body>

    <!-- Include Header -->
    <?php include("path/to/header.php"); ?>

    <!-- Include Sidebar -->
    <?php include("path/to/sidebar.php"); ?>

    <div class="upload-container">
        <h2>Upload a Song</h2>

        <!-- Song Upload Form -->
        <form action="?page=upload" method="post" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="artist">Artist:</label>
            <input type="text" id="artist" name="artist" required>

            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" required>

            <label for="duration">Duration (seconds):</label>
            <input type="number" id="duration" name="duration" required>

            <label for="release_year">Release Year:</label>
            <input type="number" id="release_year" name="release_year">

            <label for="song_file">Upload Song File:</label>
            <input type="file" id="song_file" name="song_file" accept=".mp3" required>

            <label for="cover_image">Upload Cover Image:</label>
            <input type="file" id="cover_image" name="cover_image" accept="image/*" required>

            <button type="submit">Upload</button>
        </form>
    </div>

    <!-- Add your additional scripts here -->

</body>

</html>
