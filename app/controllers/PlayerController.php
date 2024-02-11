<?php

class PlayerController {
    public static function playSong($songID) {
        $song = Song::getSongByID($songID);

        if ($song) {
            $response = [
                'status' => 'success',
                'song' => $song,
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Song not found.',
            ];
        }

        echo json_encode($response);
    }

    public static function togglePlayPause() {
        // Simulate toggling play/pause status
        // In a real scenario, you might want to store the play/pause status on the server
        $response = [
            'status' => 'success',
            'message' => 'Toggle play/pause',
        ];

        echo json_encode($response);
    }

          // Assuming $playlistID is a property or parameter in the class

    public static function playNext($currentSongID) {
        // Assuming $playlistID is the ID of the current playlist
        $nextSongID = Playlist::getNextSong(null, $currentSongID);

        if ($nextSongID) {
            // Assuming self::playSong is a method to play the song
            self::playSong($nextSongID);
        } else {
            $response = [
                'status' => 'error',
                'message' => 'No next song in the playlist.',
            ];

            echo json_encode($response);
        }
    }

    public static function playPrevious($currentSongID) {
        // Assuming $playlistID is the ID of the current playlist
        $previousSongID = Playlist::getPreviousSong(null, $currentSongID);

        if ($previousSongID) {
            // Assuming self::playSong is a method to play the song
            self::playSong($previousSongID);
        } else {
            $response = [
                'status' => 'error',
                'message' => 'No previous song in the playlist.',
            ];

            echo json_encode($response);
        }
    }
    public static function addToFavorites($songID) {
        // Add the currently playing song to favorites
        // You may need to handle user authentication and validation
        Favorite::addToFavorites($_SESSION['user_id'], $songID);

        $response = [
            'status' => 'success',
            'message' => 'Song added to favorites.',
        ];

        echo json_encode($response);
    }

    public static function addToPlaylist($songID, $playlistID) {
        // Add the currently playing song to a playlist
        // You may need to handle user authentication and validation
        Playlist::addSongToPlaylist($playlistID, $songID);

        $response = [
            'status' => 'success',
            'message' => 'Song added to the playlist.',
        ];

        echo json_encode($response);
    }

    public static function downloadSong($songID) {
        // Simulate downloading the currently playing song
        // You may implement actual download logic based on your project structure
        $response = [
            'status' => 'success',
            'message' => 'Downloading song...',
        ];

        echo json_encode($response);
    }
}
