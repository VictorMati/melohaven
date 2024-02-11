<?php

require_once("C:\Users\hp\Documents\Web Development\Projects\melohaven\app\models\Playlist.php");
require_once("C:\Users\hp\Documents\Web Development\Projects\melohaven\app\models\Song.php");

class PlaylistController {

    public static function viewPlaylist($playlistID) {
        $playlist = Playlist::getPlaylistID($playlistID);

        if ($playlist) {
            // Display playlist details, you can customize the display logic
            echo '<h1>' . $playlist->getPlaylistName() . '</h1>';

            // Retrieve songs in this playlist
            $playlistSongs = $playlist->getSongs();

            if (!empty($playlistSongs)) {
                echo '<h2>Songs in this Playlist</h2>';
                foreach ($playlistSongs as $song) {
                    echo '<p>' . $song->getTitle() . ' by ' . $song->getArtistID() . '</p>';
                    // Display other song details as needed
                }
            } else {
                echo '<p>No songs in this playlist.</p>';
            }
        } else {
            // Handle playlist not found
            echo 'Playlist not found.';
        }
    }

    public static function addSongToPlaylist($playlistID, $songID) {
        $playlist = Playlist::getPlaylistID($playlistID);

        if ($playlist) {
            // Add the song to the playlist
            $playlist->addSongToPlaylist($songID);

            // Display success message or redirect to the playlist view page
            echo 'Song added to playlist successfully!';
        } else {
            // Handle playlist not found
            echo 'Playlist not found.';
        }
    }

    public static function removeSongFromPlaylist($playlistID, $songID) {
        $playlist = Playlist::getPlaylistID($playlistID);

        if ($playlist) {
            // Remove the song from the playlist
            $playlist->removeSongFromPlaylist($songID);

            // Display success message or redirect to the playlist view page
            echo 'Song removed from playlist successfully!';
        } else {
            // Handle playlist not found
            echo 'Playlist not found.';
        }
    }

    // Other functions as required
}
