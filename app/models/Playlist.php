<?php

class Playlist {
    private $playlistID;
    private $userID;
    private $playlistName;
    // Other relevant playlist information properties

    // Constructor
    public function __construct($playlistID, $userID, $playlistName) {
        $this->playlistID = $playlistID;
        $this->userID = $userID;
        $this->playlistName = $playlistName;
        // Initialize other properties as needed
    }

    // Getter methods
    public function getPlaylistID() {
        return $this->playlistID;
    }

    public function getUserID() {
        return $this->userID;
    }

    public function getPlaylistName() {
        return $this->playlistName;
    }

    // Additional getter methods based on your properties

    // Setter methods for playlist details
    public function setPlaylistName($playlistName) {
        // Add validation or other logic if needed
        $this->playlistName = $playlistName;
    }

// Playlist functionalities
public function addSongToPlaylist($songID) {
    $db = new Database(); // Assuming you have a Database class for database interactions
    $conn = $db->getConnection();

    try {
        $stmt = $conn->prepare("INSERT INTO playlist_songs (playlistID, songID) VALUES (?, ?)");
        $stmt->bindParam(1, $this->playlistID);
        $stmt->bindParam(2, $songID);
        $stmt->execute();

        // You may want to perform additional logic here if needed

    } catch (PDOException $e) {
        // Handle database error
        // You might want to log the error or perform other actions
        echo "Error: " . $e->getMessage();
    }
}

public function removeSongFromPlaylist($songID) {
    $db = new Database(); // Assuming you have a Database class for database interactions
    $conn = $db->getConnection();

    try {
        $stmt = $conn->prepare("DELETE FROM playlist_songs WHERE playlistID = ? AND songID = ?");
        $stmt->bindParam(1, $this->playlistID);
        $stmt->bindParam(2, $songID);
        $stmt->execute();

        // You may want to perform additional logic here if needed

    } catch (PDOException $e) {
        // Handle database error
        // You might want to log the error or perform other actions
        echo "Error: " . $e->getMessage();
    }
}

public static function getPreviousSong($playlistID, $currentSongID) {
    $db = new Database(); // Assuming you have a Database class for database interactions
    $conn = $db->getConnection();

    try {
        $stmt = $conn->prepare("SELECT songID FROM playlist_songs WHERE playlistID = ? ORDER BY songOrder ASC");
        $stmt->bindParam(1, $playlistID);
        $stmt->execute();

        $songs = $stmt->fetchAll(PDO::FETCH_COLUMN);

        $currentIndex = array_search($currentSongID, $songs);

        if ($currentIndex !== false && $currentIndex > 0) {
            return $songs[$currentIndex - 1];
        } else {
            // If the current song is the first in the playlist, return the last song as the previous one
            return end($songs);
        }
    } catch (PDOException $e) {
        // Handle database error
        // You might want to log the error or perform other actions
        echo "Error: " . $e->getMessage();
        return null;
    }
}

public static function getNextSong($playlistID, $currentSongID) {
    $db = new Database(); // Assuming you have a Database class for database interactions
    $conn = $db->getConnection();

    try {
        $stmt = $conn->prepare("SELECT songID FROM playlist_songs WHERE playlistID = ? ORDER BY songOrder ASC");
        $stmt->bindParam(1, $playlistID);
        $stmt->execute();

        $songs = $stmt->fetchAll(PDO::FETCH_COLUMN);

        $currentIndex = array_search($currentSongID, $songs);

        if ($currentIndex !== false && $currentIndex < count($songs) - 1) {
            return $songs[$currentIndex + 1];
        } else {
            // If the current song is the last in the playlist, return the first song as the next one
            return reset($songs);
        }
    } catch (PDOException $e) {
        // Handle database error
        // You might want to log the error or perform other actions
        echo "Error: " . $e->getMessage();
        return null;
    }
}


    // Other methods as required
}

