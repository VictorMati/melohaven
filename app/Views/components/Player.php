<!-- player.php -->

<div>
    <audio id="audio-player"></audio>
</div>

<div class="music-player">
        <div class="player-details">
            <img src="/public//images/app_images/logo.jpg" alt="Currently Playing">
            <div class="song-info">
                <h3>Lost Control</h3>
                <p>Alan Walker</p>
            </div>
        </div>

        <div class="player-center">
            <div class="progress-bar">
                <!-- Add your progress bar here -->
            </div>

            <div class="music-controls">
                <button id="prev-button"><i class="fas fa-step-backward"></i></button>
                <button id="play-pause-button" onclick="togglePlayPause()"><i class="fas fa-play"></i></button>
                <button id="next-button"><i class="fas fa-step-forward"></i></button>
            </div>
        </div>

        <div class="additional-controls">
            <button id="add-to-favorites" onclick="addToFavorites()"><i class="fas fa-heart"></i></button>
            <button id="add-to-playlist" onclick="addToPlaylist()"><i class="fas fa-plus"></i></button>
            <button id="download-song" onclick="downloadSong()"><i class="fas fa-download"></i></button>
        </div>

</div>

<!-- Update event listeners to make AJAX requests -->
<script>
    function playPrevious() {
        // Make AJAX request to play previous song
        $.ajax({
            type: 'GET',
            url: 'player.php?action=playPrevious&currentSongID=' + currentSongID,
            success: function(response) {
                handlePlayerResponse(response);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }

    function playNext() {
        // Make AJAX request to play next song
        $.ajax({
            type: 'GET',
            url: 'player.php?action=playNext&currentSongID=' + currentSongID,
            success: function(response) {
                handlePlayerResponse(response);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }

    function addToFavorites() {
        // Make AJAX request to add the currently playing song to favorites
        $.ajax({
            type: 'GET',
            url: 'player.php?action=addToFavorites&songID=' + currentSongID,
            success: function(response) {
                handlePlayerResponse(response);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }

    function addToPlaylist() {
        // Make AJAX request to add the currently playing song to a playlist
        $.ajax({
            type: 'GET',
            url: 'player.php?action=addToPlaylist&songID=' + currentSongID + '&playlistID=' + playlistID,
            success: function(response) {
                handlePlayerResponse(response);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }

    function downloadSong() {
        // Make AJAX request to download the currently playing song
        $.ajax({
            type: 'GET',
            url: 'player.php?action=downloadSong&songID=' + currentSongID,
            success: function(response) {
                handlePlayerResponse(response);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }

    function handlePlayerResponse(response) {
        // Handle the response from the server
        const data = JSON.parse(response);

        if (data.status === 'success') {
            updatePlayerDetails(data.song);
        } else {
            console.error('Player Error:', data.message);
        }
    }
</script>

