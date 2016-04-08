<?php
include '../connect.php';
$value = json_decode(file_get_contents('php://input'), true);
echo $db->collector_location->find(array("date"=>date('Y-m-d'), "collector_name"=>$value["collector_name"]))->count();
if($db->collector_location->find(array("date"=>date('Y-m-d'), "collector_name"=>$value["collector_name"]))->count() == 0){
    $details = array(
        "collector_name" => $value["collector_name"],
        "details" => array(array("latitude"=>$value["lat"], "longitude"=>$value["lng"], "time"=>$value["time"])),
        "date" => date('Y-m-d')
    );
    $db->collector_location->insert($details);
}
else{
    $details_push = array(
        '$push' => array("details" => array(
            "latitude" => $value["lat"],
            "longitude"=>$value["lng"],
            "time"=>$value["time"]
        )
    )
    );
    $db->collector_location->update(array("collector_name"=>$value["collector_name"]), $details_push);
}

?>
