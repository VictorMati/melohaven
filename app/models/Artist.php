<?php
class Artist {
    private $artistID;
    private $name;
    private $imagePath;
    // Other relevant artist information properties

    // Constructor
    public function __construct($artistID, $name, $imagePath) {
        $this->artistID = $artistID;
        $this->name = $name;
        $this->imagePath = $imagePath;
        // Initialize other properties as needed
    }

    // Getter methods
    public function getArtistID() {
        return $this->artistID;
    }

    public function getName() {
        return $this->name;
    }

    public function getImagePath() {
        return $this->imagePath;
    }

    // Setter methods for artist details
    public function setName($name) {
        // Add validation or other logic if needed
        $this->name = $name;
    }

    public function setImagePath($imagePath) {
        // Add validation or other logic if needed
        $this->imagePath = $imagePath;
    }

    // Artist functionalities
    public function uploadSong($title, $duration, $releaseYear, $filePath, $imagePath) {
        // Add validation or other logic if needed
        // Create and return a new Song object
        return new Song(null, $title, $this->artistID, null, $duration, $releaseYear, date("Y-m-d"), $filePath, $imagePath);
    }

    public function updateUploadedSong($song, $title, $duration, $releaseYear) {
        // Check if the artist owns the song before updating
        if ($song->getArtistID() === $this->artistID) {
            // Add validation or other logic if needed
            $song->updateSongDetails($title, $duration, $releaseYear);
        } else {
            // Handle unauthorized update (e.g., throw an exception)
            throw new Exception("Unauthorized update of song.");
        }
    }

    public function updateArtistProfile($name, $imagePath) {
        // Add validation or other logic if needed
        $this->setName($name);
        $this->setImagePath($imagePath);
    }

    // Other methods as required
}
