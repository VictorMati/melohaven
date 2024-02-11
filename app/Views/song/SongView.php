<!-- Example Usage in song_view.php -->

<?php
// Include the necessary configuration and functions
require_once("path/to/config.php");
require_once("path/to/Functions.php");
require_once("path/to/SongCard.php");

// Fetch song details based on the song ID
// $songDetails = getSongDetails($songID); // Implement this function based on your logic
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $songDetails['title']; ?> - MeloHaven</title>
    <link rel="stylesheet" href="/public//css/SongView.css">
    <!-- Add your CSS stylesheets here -->
</head>

<body>

    <div class="song-view-container">
        <h2><?php echo $songDetails['title']; ?></h2>

        <div class="song-details">
            <img src="<?php echo $songDetails['cover_image']; ?>" alt="<?php echo $songDetails['title']; ?>">

            <div class="info">
                <p><strong>Artist:</strong> <?php echo $songDetails['artist']; ?></p>
                <p><strong>Genre:</strong> <?php echo $songDetails['genre']; ?></p>
                <p><strong>Duration:</strong> <?php echo $songDetails['duration']; ?> seconds</p>
                <p><strong>Release Year:</strong> <?php echo $songDetails['release_year']; ?></p>
            </div>
        </div>

        <div class="song-actions">
            <!-- Use the SongCard component -->
            <?php SongCard::render($songDetails); ?>
        </div>
    </div>

    <!-- Add your additional scripts here -->

</body>

</html>
