<!-- genre-view.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genre View</title>
    <link rel="stylesheet" href="/public/css/Genre.css">
    <!-- Add other stylesheet links here -->
</head>

<body>

    <div class="genre-container">
        <h2>Songs in Selected Genre</h2>

        <?php foreach ($genreSongs as $song) : ?>
            <div class="song">
                <h3><?php echo $song['Title']; ?></h3>
                <!-- Display other song details -->
                <button onclick="playSong(<?php echo $song['SongID']; ?>)">Play</button>
                <button onclick="addToPlaylist(<?php echo $song['SongID']; ?>)">Add to Playlist</button>
                <button onclick="addToFavorites(<?php echo $song['SongID']; ?>)">Add to Favorites</button>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        function playSong(songId) {
            // Implement logic to play the selected song
            console.log("Playing song with ID: " + songId);
        }

        function addToPlaylist(songId) {
            // Implement logic to add the selected song to a playlist
            console.log("Adding song with ID " + songId + " to playlist");
        }

        function addToFavorites(songId) {
            // Implement logic to add the selected song to favorites
            console.log("Adding song with ID " + songId + " to favorites");
        }
    </script>

</body>

</html>
