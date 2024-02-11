<?php

require_once("path-to-Song-model");

class SongController {

    // Function to retrieve and display song details
    public static function viewSong($songID) {
        $song = Song::getSongByID($songID);

        if ($song) {
            // Display song details, you can customize the display logic
            echo '<h1>' . $song->getTitle() . '</h1>';
            echo '<p>Artist: ' . $song->getArtistID() . '</p>';
            echo '<p>Genre: ' . $song->getGenreID() . '</p>';
            echo '<p>Duration: ' . $song->getDuration() . '</p>';
            // Add more details as needed
        } else {
            // Handle song not found
            echo 'Song not found.';
        }
    }

    // Function to update song details
    public static function updateSongDetails($songID, $title, $duration, $releaseYear) {
        $song = Song::getSongByID($songID);

        if ($song) {
            // Check if the user is authorized to update (you may implement user authentication)
            // For demonstration, let's assume the user is authorized

            // Update song details
            $song->updateSongDetails(null, $title, $duration, $releaseYear);

            // Display success message or redirect to the song view page
            echo 'Song details updated successfully!';
        } else {
            // Handle song not found
            echo 'Song not found.';
        }
    }

    // Function to update song image
    public static function updateSongImage($songID, $imagePath) {
        $song = Song::getSongByID($songID);

        if ($song) {
            // Check if the user is authorized to update (you may implement user authentication)
            // For demonstration, let's assume the user is authorized

            // Update song image path
            $song->setImagePath($imagePath);

            // Display success message or redirect to the song view page
            echo 'Song image updated successfully!';
        } else {
            // Handle song not found
            echo 'Song not found.';
        }
    }
}
