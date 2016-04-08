<?php

include '../connect.php';
$arr = array();
$json = json_decode(file_get_contents('php://input'));
$status = $db->collectors->findOne(
            array(
                "name"=>$json->{"username"},
                "password"=>$json->{"password"}
            )
        );
if($status) {
    $arr["status"] = "true";
}
else {
    $arr["status"] = "false";
}
echo json_encode($arr, JSON_PRETTY_PRINT);

?>
