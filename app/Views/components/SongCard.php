<?php

class SongCard {
    public static function render($song) {
        echo '<div class="song-card">';
        echo '<img src="' . $song->getImagePath() . '" alt="' . $song->getTitle() . '">';
        echo '<div class="song-info">';
        echo '<h3>' . $song->getTitle() . '</h3>';
        // Display artist name and other information as needed

        // Controls
        echo '<div class="song-controls">';
        echo '<button class="control-icon" title="Add to Favorites"><i class="fas fa-heart"></i></button>';
        echo '<button class="control-icon" title="Add to Playlist"><i class="fas fa-list"></i></button>';
        // Play icon with a data attribute to store the song ID
        echo '<button class="control-icon play-button" data-song-id="' . $song->getSongID() . '" title="Play"><i class="fas fa-play"></i></button>';
        // Add more controls as needed
        echo '</div>'; // Close song-controls
        echo '</div>'; // Close song-info
        echo '</div>'; // Close song-card
    }
}
