<?php
include '../connect.php';
$ids = explode(',' , $_POST['_user_id']);
foreach($ids as $_user){
    if($_user == "on"){
        continue;
    }
    $usr = $db->donors->findOne(array("_id"=>new MongoId($_user)));
    if($db->visit_list->find(array("_id"=>new MongoId($_POST["_id"]),"donors"=>array('$elemMatch'=>array("_user_id"=>new MongoId($_user)))))->count()){
        continue;
    }
    $db->visit_list->update(
    array(
        "_id"=>new MongoId($_POST['_id'])
    ),
    array(
        '$push'=>array(
            "donors"=>array(
            "_user_id"=>$usr['_id'],
            "name" => $usr["name"],
            "flat_no" => $usr['flat_no'],
            "building" => $usr['building'],
            "address" => $usr["address"],
            "contact" => $usr["contact"],
            "latitude" => $usr["latitude"],
            "longitude" => $usr["longitude"],
            "location" => $usr["location"]
            )
        )
    )
    );
}
?>
