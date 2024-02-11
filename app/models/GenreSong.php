<?php
class GenreSong {
    private $genreSongID;
    private $genreID;
    private $songID;

    // Constructor
    public function __construct($genreSongID, $genreID, $songID) {
        $this->genreSongID = $genreSongID;
        $this->genreID = $genreID;
        $this->songID = $songID;
        // Initialize other properties as needed
    }

    // Getter methods
    public function getGenreSongID() {
        return $this->genreSongID;
    }

    public function getGenreID() {
        return $this->genreID;
    }

    public function getSongID() {
        return $this->songID;
    }

    // Setter methods for genre-song association details
    public function setGenreID($genreID) {
        // Add validation or other logic if needed
        $this->genreID = $genreID;
    }

    public function setSongID($songID) {
        // Add validation or other logic if needed
        $this->songID = $songID;
    }

    // GenreSong functionalities
    // Add functionalities related to genre-song associations if needed

    // Example: Method to retrieve songs associated with a specific genre
    public static function getSongsByGenre($genreID) {
        $db = new Database(); // Assuming you have a Database class for database interactions
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("SELECT songID FROM genresongs WHERE genreID = ?");
            $stmt->bindParam(1, $genreID);
            $stmt->execute();

            $songIDs = $stmt->fetchAll(PDO::FETCH_COLUMN);

            // You might want to fetch Song objects based on the song IDs
            $songs = [];

            foreach ($songIDs as $songID) {
                // Assuming you have a method in Song to retrieve a song by ID
                $song = Song::getSongByID($songID);

                if ($song) {
                    $songs[] = $song;
                }
            }

            return $songs;

        } catch (PDOException $e) {
            // Handle database error
            // You might want to log the error or perform other actions
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    // Other methods as required
}
