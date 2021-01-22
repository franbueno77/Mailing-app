<?php

class Database {
    private static $instance;
    private static $connection;
    private static $prepareDb;
    private $result;

    private static $host = "localhost";
    private static $dbname = "outlaws";
    private static $dbuser = "root";
    private static $pass = "";

    private function __construct(){}
    private function __clone(){}

    public static function getDatabase() {
        if(self::$instance == null) self::$instance = new Database();
        self::$connection = self::startConnection();
        return self::$instance;
        
    }
    public static function startConnection() {
        self::$connection = new PDO("mysql:host=".self::$host."; dbname=".self::$dbname.";charset=utf8", self::$dbuser, self::$pass);

        return self::$connection;
    }

    public function query($query, $param = []) {
        self::$prepareDb = self::$connection->prepare($query);
        
        return self::$prepareDb->execute($param);
    }

    public function getClass($class = "StdClass") {

       return $this->result->fetchObject($class);
    }

 
}