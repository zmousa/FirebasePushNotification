<?php
 
class DB_Functions {
 
    private $db;
	private $connection;
	
    // constructor
    function __construct() {
        include_once './DB_Connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->connection = $this->db->connect();
    }
 
    // destructor
    function __destruct() {
         
    }
 
    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($email, $firebaseid) {
		$result = mysqli_query($this->connection, "SELECT * FROM fpn_register WHERE email = $email") or die(mysqli_error());
		if (mysqli_num_rows($result) > 0) {
			// Update existing user
			$result = mysqli_query($this->connection, "UPDATE fpn_register SET firebaseid = '$firebaseid' WHERE email = $email");
			if ($result)
				return true;
			else
				return false;
		} else {
			// insert user into database
			$result = mysqli_query($this->connection, "INSERT INTO fpn_register(email, firebaseid) VALUES('$email', '$firebaseid')");
			// check for successful store
			if ($result) {
				// get user details
				$id = mysqli_insert_id(); // last inserted id
				$result = mysqli_query($this->connection, "SELECT * FROM fpn_register WHERE id = $id") or die(mysqli_error());
				// return user details
				if (mysqli_num_rows($result) > 0) {
					return mysqli_fetch_array($result);
				} else {
					return false;
				}
			} else {
				return false;
			}
		}        
    }
 
    /**
     * Getting all users
     */
    public function getAllUsers() {
        $result = mysqli_query($this->connection, "select * FROM fpn_register");
        return $result;
    }
 
}
 
?>