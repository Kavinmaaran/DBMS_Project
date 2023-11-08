<?php
use Kreait\Firebase\Factory;
class Database
{
    public static $conn=null;
    public static function getConnection()
    {
        if (Database::$conn==null) {
            $servername = get_config("db_server");
            $username = get_config("db_username");
            $password = get_config("db_password");
            $dbname = get_config("db_name");

            // Create connection
            $connection = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            } else {
                Database::$conn=$connection;
                return Database::$conn;
            }
        } else {
            return Database::$conn;
        }
    }
    public static $mongoconn=null;
    public static function getMongoConnection()
    {
        
        if (Database::$mongoconn==null) {
            

            $m = new MongoDB\Client("mongodb://mongo:27017");
            // echo "Connection to database successfully";
            return $m;
        } else {
            return Database::$mongoconn;
        }
    }
    public static $fireconn=null;
    public static function getFireConnection()
    {    
        if (Database::$fireconn==null) {
        $factory = (new Factory)->withServiceAccount(__DIR__.'/dbms-a8b9c-e5e3009fcc03.json')
        ->withDatabaseUri('https://dbms-a8b9c-default-rtdb.firebaseio.com/');
        return $factory;

        } else {
            return Database::$fireconn;
        }
    }
}