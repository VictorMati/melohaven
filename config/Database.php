<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "@Vmn_6887!7886";
    private $dbname = "melohaven";

    protected $conn;

    // Constructor to establish the database connection
    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    // Method to get the database connection
    public function getConnection() {
        return $this->conn;
    }
}

// Example usage:
// $db = new Database();
// $conn = $db->getConnection();
// Use $conn for database queries
