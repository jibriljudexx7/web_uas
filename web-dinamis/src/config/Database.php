<?php
class Database {
    private static $host = 'db';
    private static $db_name = 'uas_db';
    private static $username = 'root';
    private static $password = 'rootpassword'; // matches the docker-compose setup
    private static $conn;

    public static function getConnection() {
        if (self::$conn == null) {
            try {
                // Read from env if available (from docker-compose environment)
                $host = getenv('DATABASE_HOST') ?: self::$host;
                $db_name = getenv('DATABASE_NAME') ?: self::$db_name;
                $username = getenv('DATABASE_USER') ?: self::$username;
                $password = getenv('DATABASE_PASSWORD') ?: self::$password;

                self::$conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $exception) {
                die("Connection error: " . $exception->getMessage());
            }
        }
        return self::$conn;
    }
}
