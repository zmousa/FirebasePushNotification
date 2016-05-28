<?php
if (isset($_GET["regId"]) && isset($_GET["message"])) {
    $regId = $_GET["regId"];
    $message = $_GET["message"];
     
    include_once './Firebase.php';
     
    $fcm = new Firebase();
 
    $registatoin_ids = array($regId);
 
    $result = $fcm->send_notification($registatoin_ids, $message);
 
    echo $result;
}
?>