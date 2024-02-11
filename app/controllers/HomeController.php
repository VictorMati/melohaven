<?php

require_once("C:\Users\hp\Documents\Web Development\Projects\melohaven\app\models\Song.php");

class HomeController {
    public function showHome() {


        // Retrieve data from Song
        $newSongs = Song::getNewSongs();
        $popularArtists = Song::getPopularArtists();
        $recommendedSongs = Song::getRecommendedSongs();
        $popularSongs = Song::getPopularSongs();

        // Example: Replace 1 with the actual user ID
        $userID = 1;

        // Retrieve user-specific data from Song
        $favoriteSongs = Song::getFavoriteSongs($userID);
        $playlists = Song::getPlaylists($userID);
        $genres = Song::getGenres();

        // Pass the data to the home view
        include ("C:\Users\hp\Documents\Web Development\Projects\melohaven\app\Views\users\home.php");
    }
}

