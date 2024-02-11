<?php
class PlayCount {
    private $playCountID;
    private $songID;
    private $count;

    // Constructor
    public function __construct($playCountID, $songID, $count) {
        $this->playCountID = $playCountID;
        $this->songID = $songID;
        $this->count = $count;
        // Initialize other properties as needed
    }

    // Getter methods
    public function getPlayCountID() {
        return $this->playCountID;
    }

    public function getSongID() {
        return $this->songID;
    }

    public function getCount() {
        return $this->count;
    }

    // Setter methods for play count details
    public function setCount($count) {
        // Add validation or other logic if needed
        $this->count = $count;
    }

    // PlayCount functionalities
    public function incrementCount() {
        // Add logic to increment the play count
        $this->count++;
    }

    // Example: Method to retrieve the play count for a specific song
    public static function getPlayCountForSong($songID) {
        $db = new Database(); // Assuming you have a Database class for database interactions
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("SELECT count FROM playcounts WHERE songID = ?");
            $stmt->bindParam(1, $songID);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                return $result['count'];
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
