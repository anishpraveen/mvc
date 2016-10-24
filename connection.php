<?php
  class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$instance = new PDO('mysql:host=localhost;dbname=mvc', 'root', 'root', $pdo_options);
      }
      return self::$instance;
    }
  }

  /**
  * 
  */
  class mysqliDB{
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "root";
    private static $dbname = "mvc";
    private static $conn= NULL;
    
    function __construct(){}

     public static function getConn() {
      if (!isset(self::$conn)) {
        self::$conn = new mysqli(self::$servername, self::$username, self::$password, self::$dbname);                
        // Check connection
        if (!self::$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
      }
      return self::$conn;
    }
  }
?>