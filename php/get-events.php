<?php
include '../connect.php';
$events = $db->events->find(array("end_date"=>array('$gte' => date('Y-m-d'))));
$json_object = array();
foreach($events as $event){
   $temp = array(
       "title" => $event["title"],
       "desc" => $event['description'],
       "image" => "192.168.0.103/mesco/php/".$event['image']
   );
   array_push($json_object, $temp);
}

echo json_encode($json_object, JSON_UNESCAPED_SLASHES);
?>
