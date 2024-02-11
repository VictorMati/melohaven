<?php

require_once("../melohaven/config/Database.php");

class UserModel {
    private $userID;
    private $username;
    private $password; // Note: Password should be hashed and stored securely
    private $email;
    private $userType;

    // Constructor
    public function __construct($userID, $username, $password, $email, $userType) {
        $this->userID = $userID;
        $this->username = $username;
        $this->password = $password; // Password should be hashed
        $this->email = $email;
        $this->userType = $userType;
        // Initialize other properties as needed
    }

    // Getter methods
    public function getUserID() {
        return $this->userID;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getUserType() {
        return $this->userType;
    }

    // Setter methods for user details
    public function setUsername($Username) {
        // Add validation or other logic if needed
        $this->username = $Username;
    }

    public function setEmail($email) {
        // Add validation or other logic if needed
        $this->email = $email;
    }

    // Update password and hash it
    public function updatePassword($password) {
        // Add validation or other logic if needed
        $this->password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
    }

    // User authentication methods
    public function verifyPassword($password) {
        // Verify user-entered password against hashed password
        return password_verify($password, $this->password);
    }

    // Static method to create a new user instance during registration
    public static function createNewUser($username, $email, $password) {
        // Add validation or other logic if needed
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password

        return new UserModel(null, $username, $hashedPassword, $email, 'Normal');
    }

  // Static method to fetch a user by ID
  public static function getUserByID($userID) {
    $db = new Database();
    $conn = $db->getConnection();

    try {
        $stmt = $conn->prepare("SELECT * FROM User WHERE UserID = :userID");
        $stmt->bindParam(':userID', $userID);
        $stmt->execute();

        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userData) {
            return new UserModel(
                $userData['UserID'],
                $userData['Username'],
                $userData['Password'],
                $userData['Email'],
                $userData['UserType']
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


    // Authentication status check
    public static function isAuthenticated() {
        return isset($_SESSION['user_id']);
    }

    // Static method to fetch user favorites by ID
    public static function getUserFavorites($userID) {
        $db = new Database();
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("SELECT * FROM FavoriteSongs WHERE UserID = :userID");
            $stmt->bindParam(':userID', $userID);
            $stmt->execute();

            $favorites = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Add logic to retrieve full song details based on SongID
            // $fullFavorites = array_map('getUserFavoritesDetails', $favorites);

            return $favorites;
        } catch (PDOException $e) {
            // Handle database error
            return [];
        }
    }

    // Static method to fetch user playlists by ID
    public static function getUserPlaylists($userID) {
        $db = new Database();
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("SELECT * FROM Playlist WHERE UserID = :userID");
            $stmt->bindParam(':userID', $userID);
            $stmt->execute();

            $playlists = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $playlists;
        } catch (PDOException $e) {
            // Handle database error
            return [];
        }
    }

    // Save user details to the database
    public function saveUser() {
        $db = new Database();
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("UPDATE User SET Username = :username, Email = :email WHERE UserID = :userID");
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':userID', $this->userID);
            $stmt->execute();

            // Additional logic if needed
        } catch (PDOException $e) {
            // Handle database error
        }
    }
}

?>
