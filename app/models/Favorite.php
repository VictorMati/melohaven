<?php

class Favorite {
    private $favoriteID;
    private $userID;
    private $songID;
    private $timestamp;

    // Constructor
    public function __construct($favoriteID, $userID, $songID, $timestamp) {
        $this->favoriteID = $favoriteID;
        $this->userID = $userID;
        $this->songID = $songID;
        $this->timestamp = $timestamp;
        // Initialize other properties as needed
    }

    // Getter methods
    public function getFavoriteID() {
        return $this->favoriteID;
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

    // Setter methods for favorites details
    // Assuming you may need to update timestamp or other details in the future
    public function setTimestamp($timestamp) {
        // Add validation or other logic if needed
        $this->timestamp = $timestamp;
    }

    // Favorites functionalities
    public static function addToFavorites($userID, $songID) {
        $db = new Database(); // Assuming you have a Database class for database interactions
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("INSERT INTO favorites (userID, songID, timestamp) VALUES (?, ?, CURRENT_TIMESTAMP)");
            $stmt->bindParam(1, $userID);
            $stmt->bindParam(2, $songID);
            $stmt->execute();

            // You may want to perform additional logic here if needed

        } catch (PDOException $e) {
            // Handle database error
            // You might want to log the error or perform other actions
            echo "Error: " . $e->getMessage();
        }
    }

    public static function removeFromFavorites($favoriteID) {
        $db = new Database(); // Assuming you have a Database class for database interactions
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("DELETE FROM favorites WHERE favoriteID = ?");
            $stmt->bindParam(1, $favoriteID);
            $stmt->execute();

            // You may want to perform additional logic here if needed

        } catch (PDOException $e) {
            // Handle database error
            // You might want to log the error or perform other actions
            echo "Error: " . $e->getMessage();
        }
    }

    public static function getUserFavorites($userID) {
        $db = new Database(); // Assuming you have a Database class for database interactions
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("SELECT * FROM favorites WHERE userID = ?");
            $stmt->bindParam(1, $userID);
            $stmt->execute();

            $favoritesData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $favorites = [];

            foreach ($favoritesData as $favoriteData) {
                $favorites[] = new Favorite(
                    $favoriteData['favoriteID'],
                    $favoriteData['userID'],
                    $favoriteData['songID'],
                    $favoriteData['timestamp']
                    // Include other properties as needed
                );
            }

            return $favorites;

        } catch (PDOException $e) {
            // Handle database error
            // You might want to log the error or perform other actions
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    // Other methods as required
}
