<!-- playlist-view.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlist View</title>
    <link rel="stylesheet" href="/public/css/Playlist.css">
    <!-- Add other stylesheet links here -->
</head>

<body>

    <div class="playlist-container">
        <h2>My Playlists</h2>

        <?php foreach ($userPlaylists as $playlist) : ?>
            <div class="playlist">
                <h3><?php echo $playlist['PlaylistName']; ?></h3>
                <!-- Display other playlist details -->
                <a href="?page=playlist&id=<?php echo $playlist['PlaylistID']; ?>">View Playlist</a>
            </div>
        <?php endforeach; ?>
    </div>

</body>

</html>
