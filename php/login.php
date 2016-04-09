<?php
include '../connect.php';
$arr = array();
$json = json_decode(file_get_contents('php://input'), true);
$reponse = "";
$username = $json['user'];
$password = $json['pass'];
$cursor = $db->donors->findOne(array('email'=>$username));
if(password_verify($password, $cursor['password'])){
    //$arr["response"] = "true";
    $arr["response"] = strval($cursor["_id"]);
}
else{
    $arr["response"] = "false";
}
echo json_encode($arr);
?>
