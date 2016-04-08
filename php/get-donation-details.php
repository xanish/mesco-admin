<?php
include '../connect.php';
$id = json_decode(file_get_contents('php://input'), true);
$donations = $db->collection_details->find(array("donor_id"=>$id["id"]));
$temp = array();
foreach ($donations as $donation) {
    $x = array(
       "newspaper" => $donation['newspaper'],
       "others" => $donation['others'],
       "month" => $donation['month']
   );
   array_push($temp, $x);
}

echo json_encode($temp);
?>
