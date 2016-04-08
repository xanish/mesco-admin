<?php
include '../connect.php';
$collector = $_POST['collector-name'];
$date = $_POST['collection-date'];
$donor_arr = array();

foreach ($_POST['chk'] as $id) {
    $donor = $db->donors->findOne(array("_id"=>new MongoId($id)));
    $temp = array(
        "name" => $donor["name"],
        "flat_no" => $donor['flat_no'],
        "building" => $donor['building'],
        "address" => $donor["address"],
        "contact" => $donor["contact"],
        "latitude" => $donor["latitude"],
        "longitude" => $donor["longitude"],
        "location" => $donor["location"],
        "_user_id" => $donor["_id"]
    );
    array_push($donor_arr, $temp);
}

$db->visit_list->insert(
array(
    "date" => $date,
    "collector_name" => $collector,
    "donors" => $donor_arr
)
);
/*
$db->visit_list->update(
array(
    "date" => $date,
    "collector_name" => $collector
),
array(
    '$push' => array("donors" => $donor_arr)
)
);*/
/*foreach ($_POST['chk'] as $value) {
    $db->donors->update(array(
       "_id"=>new MongoId($value)),
       array(
           '$set' => array(
               //"status"=>"1",
               "collector_name"=>$collector,
           )
       )
   );
   $db->donors->update(array(
      "_id"=>new MongoId($value)),
      array(
          '$push' => array('visit_date' => $date)
      )
  );
}*/
header('Location:../visit-listings.php');
?>
