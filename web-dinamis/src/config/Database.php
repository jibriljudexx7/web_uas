<?php
class Database {
    private static $conn;

    public static function getConnection() {
        if (self::$conn == null) {
            // Read from env if available (from docker-compose environment)
            $host = getenv('DATABASE_HOST') ?: 'db';
            $db_name = getenv('DATABASE_NAME') ?: 'uas_db';
            $username = getenv('DATABASE_USER') ?: 'root';
            $password = getenv('DATABASE_PASSWORD') ?: 'rootpassword';

            // Retry loop: wait for database to be ready
            $maxRetries = 10;
            $retryDelay = 2; // seconds

            for ($i = 0; $i < $maxRetries; $i++) {
                try {
                    $dsn = "mysql:host=" . $host . ";dbname=" . $db_name . ";charset=utf8mb4";
                    self::$conn = new PDO($dsn, $username, $password);
                    self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                    return self::$conn;
                } catch (PDOException $e) {
                    if ($i === $maxRetries - 1) {
                        // Show detailed debug info on final failure
                        $loaded = implode(', ', get_loaded_extensions());
                        $pdoDrivers = implode(', ', PDO::getAvailableDrivers());
                        die("Connection error: " . $e->getMessage() 
                            . "<br>PDO drivers available: " . $pdoDrivers
                            . "<br>Host: " . $host 
                            . "<br>DB: " . $db_name);
                    }
                    sleep($retryDelay);
                }
            }
        }
        return self::$conn;
    }
}
