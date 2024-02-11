<?php

require_once("Database.php"); // Adjust the path based on your file structure

class NewlyAddedSong {
    private $newlyAddedSongID;
    private $songID;
    private $addedTimestamp;

    // Constructor
    public function __construct($newlyAddedSongID, $songID, $addedTimestamp) {
        $this->newlyAddedSongID = $newlyAddedSongID;
        $this->songID = $songID;
        $this->addedTimestamp = $addedTimestamp;
        // Initialize other properties as needed
    }

    // Getter methods
    public function getNewlyAddedSongID() {
        return $this->newlyAddedSongID;
    }

    public function getSongID() {
        return $this->songID;
    }

    public function getAddedTimestamp() {
        return $this->addedTimestamp;
    }

    // Setter methods for newly added song details
    public function setAddedTimestamp($addedTimestamp) {
        // Add validation or other logic if needed
        $this->addedTimestamp = $addedTimestamp;
    }

    // Database interaction methods

    // Save the newly added song to the database
    public function save() {
        $db = new Database();
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("
                INSERT INTO newlyaddedsongs (songID, addedTimestamp)
                VALUES (:songID, :addedTimestamp)
            ");
            $stmt->bindParam(':songID', $this->songID);
            $stmt->bindParam(':addedTimestamp', $this->addedTimestamp);

            $stmt->execute();

            // Update the object with the new ID
            $this->newlyAddedSongID = $conn->lastInsertId();

            return true;
        } catch (PDOException $e) {
            // Handle database error
            return false;
        }
    }

    // Fetch all newly added songs from the database
    public static function getAllNewlyAddedSongs() {
        $db = new Database();
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("
                SELECT * FROM newlyaddedsongs
            ");
            $stmt->execute();

            $newlyAddedSongsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $newlyAddedSongs = [];

            foreach ($newlyAddedSongsData as $songData) {
                $newlyAddedSongs[] = new NewlyAddedSong(
                    $songData['newlyAddedSongID'],
                    $songData['songID'],
                    $songData['addedTimestamp']
                );
            }

            return $newlyAddedSongs;
        } catch (PDOException $e) {
            // Handle database error
            return [];
        }
    }

    // Other functionalities related to newly added songs

    // Other methods as required
}
