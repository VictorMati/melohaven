<!-- player.php -->

<div class="music-player">
    <?php if ($isSongPlaying) : ?>
        <div class="player-details">
            <img src="<?php echo $currentlyPlaying['cover_image']; ?>" alt="Currently Playing">
            <div class="song-info">
                <h3><?php echo $currentlyPlaying['title']; ?></h3>
                <p><?php echo $currentlyPlaying['artist']; ?></p>
            </div>
            <div>
                <audio id="audio-player"></audio>
            </div>
        </div>
        <div class="music-controls">
            <button id="prev-button"><i class="fas fa-step-backward"></i></button>
            <button id="play-pause-button" onclick="togglePlayPause()"><i class="fas fa-play"></i></button>
            <button id="next-button"><i class="fas fa-step-forward"></i></button>
        </div>

        <div class="progress-bar">
            <!-- Add your progress bar here -->
        </div>

        <div class="additional-controls">
            <button id="add-to-favorites" onclick="addToFavorites()"><i class="fas fa-heart"></i></button>
            <button id="add-to-playlist" onclick="addToPlaylist()"><i class="fas fa-plus"></i></button>
            <button id="download-song" onclick="downloadSong()"><i class="fas fa-download"></i></button>
        </div>

    <?php else : ?>
        <p>No song currently playing.</p>
    <?php endif; ?>
</div>

<script>
    function togglePlayPause() {
        // Implement logic to toggle play/pause
        console.log("Toggle play/pause");
    }

    function addToFavorites() {
        // Implement logic to add the currently playing song to favorites
        console.log("Adding to favorites");
    }

    function addToPlaylist() {
        // Implement logic to add the currently playing song to a playlist
        console.log("Adding to playlist");
    }

    function downloadSong() {
        // Implement logic to download the currently playing song
        console.log("Downloading song");
    }
</script>
