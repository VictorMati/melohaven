<?php
class RecommendationHistory {
    private $recommendationID;
    private $userID;
    private $songID;
    private $timestamp;

    // Constructor
    public function __construct($recommendationID, $userID, $songID, $timestamp) {
        $this->recommendationID = $recommendationID;
        $this->userID = $userID;
        $this->songID = $songID;
        $this->timestamp = $timestamp;
        // Initialize other properties as needed
    }

    // Getter methods
    public function getRecommendationID() {
        return $this->recommendationID;
    }

    public function getUserID() {
        return $this->userID;
    }

    public function getSongID() {
        return $this->songID;
    }

    public function getTimestamp() {
        return $this->timestamp;
    }

    // Setter methods for recommendation history details
    public function setTimestamp($timestamp) {
        // Add validation or other logic if needed
        $this->timestamp = $timestamp;
    }

    // RecommendationHistory functionalities
    // Example: Method to save recommendation history to the database
    public function saveToDatabase() {
        $db = new Database(); // Assuming you have a Database class for database interactions
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("INSERT INTO recommendationhistory (userID, songID, timestamp) VALUES (?, ?, ?)");
            $stmt->bindParam(1, $this->userID);
            $stmt->bindParam(2, $this->songID);
            $stmt->bindParam(3, $this->timestamp);
            $stmt->execute();

            return true; // Successfully saved to the database

        } catch (PDOException $e) {
            // Handle database error
            // You might want to log the error or perform other actions
            echo "Error: " . $e->getMessage();
            return false; // Failed to save to the database
        }
    }

    // Other methods as required
}
