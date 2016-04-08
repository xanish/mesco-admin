<?php
include '../connect.php';
$ids = explode(',' , $_POST['_user_id']);
foreach($ids as $_user){
    if($_user == "on"){
        continue;
    }
    $db->visit_list->update(
    array(
        "_id"=>new MongoId($_POST['_id'])
    ),
    array(
        '$pull'=>array("donors"=>array("_user_id"=>new MongoId($_user)))
    )
    );
}

?>
