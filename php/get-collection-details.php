<?php
include '../connect.php';
$value_arr = json_decode(file_get_contents('php://input'),true);

foreach($value_arr as $value){
    if($db->collection_details->find(array("donor_id"=>$value['id'], "month"=>date('d F Y')))->count() == 1){
        continue;
    }
    $details = array(
        "donor_id" => $value["id"],
        "newspaper" => $value["newspaper"],
        "others" => $value["otheritems"],
        "present" => $value["present"],
        "month" => date('d F Y')
    );

    $db->collection_details->insert($details);
}
?>
