<?php
include '../connect.php';
$db->visit_list->update(
array(
    "_id"=>new MongoId($_POST['_id'])
),
array(
    '$set'=>array("date"=>$_POST['date'])
)
);
?>
