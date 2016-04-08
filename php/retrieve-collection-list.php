<?php
include '../connect.php';
require_once('php-master/composer/lib/autoloader.php');
use Pubnub\Pubnub;
$items = $db->visit_list->find(array(
    "date"=> date('Y-m-d')
    )
);
$pubnub = new Pubnub('pub-c-5a446557-7eb7-4edb-9ef9-50ad86c4d4bd', 'sub-c-141cdffa-faea-11e5-8b0b-0619f8945a4f');
$message = "We have scheduled a collection appointment for you today, please confirm your presence using your app. Incase of absence of collector please notify us for the same. Thank You!";
$json_object = array();
foreach ($items as $item) {
    foreach($item['donors'] as $i){
        $temp = array(
            "name" => $i["name"],
            "flat_no" => $i['flat_no'],
            "building" => $i['building'],
            "address" => $i["address"],
            "contact" => $i["contact"],
            "latitude" => $i["latitude"],
            "longitude" => $i["longitude"],
            "location" => $i["location"],
            "id" => strval($i["_user_id"]),
            "collector_name" => $item['collector_name']
        );
        array_push($json_object, $temp);
        $publish_result = $pubnub->publish(strval($i["_user_id"]), $message);
        //print_r($publish_result);
    }
}
echo json_encode($json_object, JSON_PRETTY_PRINT);
?>
