<?php
class Genre {
    private $genreID;
    private $name;
    // Other relevant genre information properties

    // Constructor
    public function __construct($genreID, $name) {
        $this->genreID = $genreID;
        $this->name = $name;
        // Initialize other properties as needed
    }

    // Getter methods
    public function getGenreID() {
        return $this->genreID;
    }

    public function getName() {
        return $this->name;
    }

    // Setter methods for genre details
    public function setName($name) {
        // Add validation or other logic if needed
        $this->name = $name;
    }

    // Genre functionalities
    // Example: Method to retrieve songs associated with this genre from the database
    public function getSongs() {
        $db = new Database(); // Assuming you have a Database class for database interactions
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("SELECT * FROM genre_songs WHERE genreID = ?");
            $stmt->bindParam(1, $this->genreID);
            $stmt->execute();

            $songsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $songs = [];
            foreach ($songsData as $songData) {
                // Assuming you have a Song class
                $songs[] = new Song($songData['songID'], $songData['title'], $songData['artistID'], NULL, NULL, NULL, NULL, NULL, NULL);
            }

            return $songs;

        } catch (PDOException $e) {
            // Handle database error
            // You might want to log the error or perform other actions
            echo "Error: " . $e->getMessage();
            return []; // Return an empty array in case of an error
        }
    }

    // Other methods as required
}
