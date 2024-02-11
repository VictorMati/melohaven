<?php

require_once("C:\Users\hp\Documents\Web Development\Projects\melohaven\app\models\Genre.php");
require_once("C:\Users\hp\Documents\Web Development\Projects\melohaven\app\models\GenreSong.php");
require_once("C:\Users\hp\Documents\Web Development\Projects\melohaven\app\models\Song.php");

class GenreController {

    public static function viewGenre($genreID) {
        $genre = Genre::getGenreID($genreID);

        if ($genre) {
            // Display genre details, you can customize the display logic
            echo '<h1>' . $genre->getName() . '</h1>';

            // Retrieve songs associated with this genre
            $genreSongs = GenreSong::getSongsByGenre($genreID);

            if (!empty($genreSongs)) {
                echo '<h2>Songs in this Genre</h2>';
                foreach ($genreSongs as $song) {
                    echo '<p>' . $song->getTitle() . ' by ' . $song->getArtistID() . '</p>';
                    // Display other song details as needed
                }
            } else {
                echo '<p>No songs in this genre.</p>';
            }
        } else {
            // Handle genre not found
            echo 'Genre not found.';
        }
    }

    // Other functions as required
}
