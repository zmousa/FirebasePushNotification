<?php
 
/**
 * Registering a user device
 * Store reg id in users table
 */
if (isset($_POST["imei"]) && isset($_POST["fcm_regid"])) {
    $email = $_POST["imei"];
    $fcm_regid = $_POST["fcm_regid"]; // FCM Registration ID
    // Store user details in db
    include_once './DB_Functions.php';
    include_once './Firebase.php';
 
    $db = new DB_Functions();
    $fcm = new Firebase();
 
    $res = $db->storeUser($email, $fcm_regid);
	
	if($res != false){
		return 'success';
	} else {
		return 'failure';
	}
} else {
    // user details missing
}
?>