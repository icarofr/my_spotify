<?php
class Connection
{

    private static $conn = null;

    private $connection = null;

    private function __construct()
    {
        $servername = "localhost";
        $username = "admin";
        $dbname = "rush_spotify";

        try {
            $this->connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $username);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage(); // Should look into a different error handling mechanism 
        }
    }

    public static function getConnection()
    {
        if (self::$conn === null) {
            self::$conn = new self();
        }
        return self::$conn->connection;
    }
}
