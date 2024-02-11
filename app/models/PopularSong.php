<?php

class PopularSong {
    private $popularSongID;
    private $songID;
    private $playCount;

    // Constructor
    public function __construct($popularSongID, $songID, $playCount) {
        $this->popularSongID = $popularSongID;
        $this->songID = $songID;
        $this->playCount = $playCount;
        // Initialize other properties as needed
    }

    // Getter methods
    public function getPopularSongID() {
        return $this->popularSongID;
    }

    public function getSongID() {
        return $this->songID;
    }

    public function getPlayCount() {
        return $this->playCount;
    }

    // Setter methods for popular song details
    public function setPlayCount($playCount) {
        // Add validation or other logic if needed
        $this->playCount = $playCount;
    }

    // PopularSong functionalities
    // Example: Method to increment the play count for a popular song
    public function incrementPlayCount() {
        // Add logic to increment the play count
        $this->playCount++;
    }

    // Example: Method to retrieve the play count for a specific song
    public static function getPlayCountForSong($songID) {
        $db = new Database(); // Assuming you have a Database class for database interactions
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("SELECT playCount FROM popularsongs WHERE songID = ?");
            $stmt->bindParam(1, $songID);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                return $result['playCount'];
            } else {
                return 0; // Default play count if not found
            }

        } catch (PDOException $e) {
            // Handle database error
            // You might want to log the error or perform other actions
            echo "Error: " . $e->getMessage();
            return 0;
        }
    }

    // Other methods as required
}
