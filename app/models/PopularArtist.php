<?php
class PopularArtist {
    private $popularArtistID;
    private $artistID;
    private $playCount;

    // Constructor
    public function __construct($popularArtistID, $artistID, $playCount) {
        $this->popularArtistID = $popularArtistID;
        $this->artistID = $artistID;
        $this->playCount = $playCount;
        // Initialize other properties as needed
    }

    // Getter methods
    public function getPopularArtistID() {
        return $this->popularArtistID;
    }

    public function getArtistID() {
        return $this->artistID;
    }

    public function getPlayCount() {
        return $this->playCount;
    }

    // Setter methods for popular artist details
    public function setPlayCount($playCount) {
        // Add validation or other logic if needed
        $this->playCount = $playCount;
    }

    // PopularArtist functionalities
    // Example: Method to increment the play count for a popular artist
    public function incrementPlayCount() {
        // Add logic to increment the play count
        $this->playCount++;
    }

    // Example: Method to retrieve the play count for a specific artist
    public static function getPlayCountForArtist($artistID) {
        $db = new Database(); // Assuming you have a Database class for database interactions
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("SELECT playCount FROM popularartists WHERE artistID = ?");
            $stmt->bindParam(1, $artistID);
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
