<?php
define( 'API_ACCESS_KEY', 'your api key' );
define( 'FIREBASE_SEND_URL', 'https://fcm.googleapis.com/fcm/send' );

class Firebase {
 
    function __construct() {
         
    }
 
    /**
     * Sending Push Notification
     */
    public function send_notification($registatoin_ids, $message) {
        
        $msg = array
		(
			'title'		=> 'Firebase Notification',
			'message'	=> $message,
			'type'		=> 'message'
		);
		$fields = array
		(
			'registration_ids' 	=> $registatoin_ids,
			'data'			=> $msg
		);
		 
		$headers = array
		(
			'Authorization: key=' . API_ACCESS_KEY,
			'Content-Type: application/json'
		);
		 
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, FIREBASE_SEND_URL );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
		
		echo $result;
    }
}
 
?>