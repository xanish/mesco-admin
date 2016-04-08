<?php
include '../connect.php';
$db->visit_list->update(
array(
    "_id"=>new MongoId($_POST['_id'])
),
array(
    '$set'=>array("collector_name"=>$_POST['collector_name'])
)
);
?>
