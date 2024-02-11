<?php

require_once("C:\Users\hp\Documents\Web Development\Projects\melohaven\app\models\Artist.php");
require_once("C:\Users\hp\Documents\Web Development\Projects\melohaven\app\models\SongModel.php");  // Assuming SongModel is required

class ArtistController {
    public function showArtistProfile($artistID) {
        // Retrieve artist details from the model
        $artist = Artist::getArtistID($artistID);

        // Retrieve songs uploaded by the artist
        $artistSongs = Song::getSongsByArtist($artistID);

        // Include the view to display artist profile
        include("C:\Users\hp\Documents\Web Development\Projects\melohaven\app\Views\artists\artist_profile.php");
    }

    public function uploadSong($artistID, $title, $duration, $releaseYear, $filePath, $imagePath) {
        // Create an instance of the Artist model
        $artist = new Artist($artistID, null, null);  // You might need to retrieve the name and image path from the database

        try {
            // Upload the song using the artist model
            $song = $artist->uploadSong($title, $duration, $releaseYear, $filePath, $imagePath);

            // Display success message or redirect to artist profile
            echo "Song uploaded successfully!";
        } catch (Exception $e) {
            // Handle the exception (e.g., display an error message)
            echo "Error uploading song: " . $e->getMessage();
        }
    }

    public function updateArtistProfile($artistID, $name, $imagePath) {
        // Create an instance of the Artist model
        $artist = new Artist($artistID, null, null);  // You might need to retrieve the existing name and image path from the database

        try {
            // Update the artist profile using the artist model
            $artist->updateArtistProfile($name, $imagePath);

            // Display success message or redirect to updated artist profile
            echo "Artist profile updated successfully!";
        } catch (Exception $e) {
            // Handle the exception (e.g., display an error message)
            echo "Error updating artist profile: " . $e->getMessage();
        }
    }
}

?>
