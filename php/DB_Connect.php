<?php
  
class DB_Connect {
  
    // constructor
    function __construct() {
  
    }
  
    // destructor
    function __destruct() {
        // $this->close();
    }
  
    // Connecting to database
    public function connect() {
        require_once 'Config.php';
        // connecting to mysql
		$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
  
        // return database handler
        return $connection;
    }
  
    // Closing database connection
    public function close() {
        mysql_close();
    }
  
} 
?>