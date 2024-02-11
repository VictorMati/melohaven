<?php

require_once("C:\Users\hp\Documents\Web Development\Projects\melohaven\config\Database.php");

class Song {
    private $songID;
    private $title;
    private $artistID;
    private $genreID;
    private $duration;
    private $releaseYear;
    private $uploadDate;
    private $filePath;
    private $imagePath;

    // Additional properties based on your database schema

    // Constructor
    public function __construct($songID, $title, $artistID, $genreID, $duration, $releaseYear, $uploadDate, $filePath, $imagePath) {
        $this->songID = $songID;
        $this->title = $title;
        $this->artistID = $artistID;
        $this->genreID = $genreID;
        $this->duration = $duration;
        $this->releaseYear = $releaseYear;
        $this->uploadDate = $uploadDate;
        $this->filePath = $filePath;
        $this->imagePath = $imagePath;
        // Initialize other properties as needed
    }

    // Getter methods
    public function getSongID() {
        return $this->songID;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getArtistID() {
        return $this->artistID;
    }

    public function getGenreID() {
        return $this->genreID;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function getReleaseYear() {
        return $this->releaseYear;
    }

    public function getUploadDate() {
        return $this->uploadDate;
    }

    public function getFilePath() {
        return $this->filePath;
    }

    public function getImagePath() {
        return $this->imagePath;
    }
    public static function getNewSongs() {
        $db = new Database();
        $conn = $db->getConnection();
    
        try {
            $stmt = $conn->prepare("
                SELECT *
                FROM song
                JOIN newlyaddedsongs ON songID = songID
                ORDER BY addedTimestamp DESC
            ");
            $stmt->execute();
    
            $newSongsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $newSongs = [];
    
            foreach ($newSongsData as $songData) {
                $newSongs[] = new Song(
                    $songData['songID'],
                    $songData['title'],
                    $songData['artistID'],
                    $songData['genreID'],
                    $songData['duration'],
                    $songData['releaseYear'],
                    $songData['uploadDate'],
                    $songData['filePath'],
                    $songData['imagePath']
                    // Include other properties as needed
                );
            }
    
            return $newSongs;
        } catch (PDOException $e) {
            // Handle database error
            return [];
        }
    }
    


    // Static method to fetch popular artists
    public static function getPopularArtists() {
        $db = new Database();
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("SELECT * FROM popularartists");
            $stmt->execute();

            $popularArtists = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $popularArtists;
        } catch (PDOException $e) {
            // Handle database error
            return [];
        }
    }



    // Additional getter methods based on your properties

    // Setter methods for admin functionalities
    public function setFilePath($filePath) {
        // Add validation or other logic if needed
        $this->filePath = $filePath;
    }

    public function setImagePath($imagePath) {
        // Add validation or other logic if needed
        $this->imagePath = $imagePath;
    }

    public function updateSongDetails($songID, $title, $duration, $releaseYear) {
        $db = new Database();
        $conn = $db->getConnection();
    
        try {
            // Prepare the SQL statement
            $stmt = $conn->prepare("
                UPDATE songs
                SET Title = :title, Duration = :duration, ReleaseYear = :releaseYear
                WHERE SongID = :songID
            ");
    
            // Bind parameters
            $stmt->bindParam(':songID', $songID);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':duration', $duration);
            $stmt->bindParam(':releaseYear', $releaseYear);
    
            // Execute the statement
            $stmt->execute();
    
        } catch (PDOException $e) {
            // Handle database error
        }
    }
    

    // Other methods as required

   // Static method to fetch a song by ID
   public static function getSongByID($songID) {
    $db = new Database();
    $conn = $db->getConnection();

    try {
        $stmt = $conn->prepare("SELECT * FROM song WHERE SongID = :songID");
        $stmt->bindParam(':songID', $songID);
        $stmt->execute();

        $songData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($songData) {
            return new Song(
                $songData['SongID'],
                $songData['Title'],
                $songData['ArtistID'],
                $songData['GenreID'],
                $songData['Duration'],
                $songData['ReleaseYear'],
                $songData['UploadDate'],
                $songData['FilePath'],
                $songData['ImagePath']
                // Include other properties as needed
            );
        } else {
            return null;
        }
    } catch (PDOException $e) {
        // Handle database error
        return null;
    }
}

// Static method to fetch recommended songs
public static function getRecommendedSongs() {
    $db = new Database();
    $conn = $db->getConnection();

    try {
        $stmt = $conn->prepare("SELECT * FROM recommendedsongs");
        $stmt->execute();

        $recommendedSongs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $recommendedSongs;
    } catch (PDOException $e) {
        // Handle database error
        return [];
    }
}

// Static method to fetch popular songs
public static function getPopularSongs() {
    $db = new Database();
    $conn = $db->getConnection();

    try {
        $stmt = $conn->prepare("SELECT * FROM popularsongs");
        $stmt->execute();

        $popularSongs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $popularSongs;
    } catch (PDOException $e) {
        // Handle database error
        return [];
    }
}

// Static method to fetch favorite songs
public static function getFavoriteSongs($userID) {
    $db = new Database();
    $conn = $db->getConnection();

    try {
        $stmt = $conn->prepare("SELECT * FROM favoritesongs WHERE UserID = :userID");
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();

        $favoriteSongs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $favoriteSongs;
    } catch (PDOException $e) {
        // Handle database error
        return [];
    }
}

// Static method to fetch playlists
public static function getPlaylists($userID) {
    $db = new Database();
    $conn = $db->getConnection();

    try {
        $stmt = $conn->prepare("SELECT * FROM playlist WHERE UserID = :userID");
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();

        $playlists = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $playlists;
    } catch (PDOException $e) {
        // Handle database error
        return [];
    }
}

// Static method to fetch genres
public static function getGenres() {
    $db = new Database();
    $conn = $db->getConnection();

    try {
        $stmt = $conn->prepare("SELECT * FROM genre");
        $stmt->execute();

        $genres = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $genres;
    } catch (PDOException $e) {
        // Handle database error
        return [];
    }
}

public static function uploadSong($title, $artistID, $duration, $releaseYear, $filePath, $imagePath) {
    $db = new Database();
    $conn = $db->getConnection();

    try {
        // Prepare the SQL statement
        $stmt = $conn->prepare("
            INSERT INTO songs (Title, ArtistID, Duration, ReleaseYear, UploadDate, FilePath, ImagePath)
            VALUES (:title, :artistID, :duration, :releaseYear, :uploadDate, :filePath, :imagePath)
        ");

        // Bind parameters
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':artistID', $artistID);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':releaseYear', $releaseYear);
        $stmt->bindParam(':uploadDate', date("Y-m-d"));
        $stmt->bindParam(':filePath', $filePath);
        $stmt->bindParam(':imagePath', $imagePath);

        // Execute the statement
        $stmt->execute();

        // Get the last inserted ID
        $songID = $conn->lastInsertId();

        // Create and return a new Song object
        return new Song($songID, $title, $artistID, null, $duration, $releaseYear, date("Y-m-d"), $filePath, $imagePath);

    } catch (PDOException $e) {
        // Handle database error
        return null;
    }
}

// Function to get songs by artist
public static function getSongsByArtist($artistID) {
    $db = new Database();
    $conn = $db->getConnection();

    try {
        $stmt = $conn->prepare("
            SELECT *
            FROM song
            WHERE ArtistID = :artistID
        ");
        $stmt->bindParam(':artistID', $artistID, PDO::PARAM_INT);
        $stmt->execute();

        $songsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $songs = [];

        foreach ($songsData as $songData) {
            $songs[] = new Song(
                $songData['SongID'],
                $songData['Title'],
                $songData['ArtistID'],
                $songData['GenreID'],
                $songData['Duration'],
                $songData['ReleaseYear'],
                $songData['UploadDate'],
                $songData['FilePath'],
                $songData['ImagePath']
                // Include other properties as needed
            );
        }

        return $songs;
    } catch (PDOException $e) {
        // Handle database error
        return [];
    }
}
}