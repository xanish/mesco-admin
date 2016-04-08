<?php
include '../connect.php';
foreach($_POST['chk'] as $value){
   $db->visit_list->update(array(
       "_id"=>new MongoId($_POST['_id'])),
       array(
           '$pull'=>array(
               "donors" => $value
           )
       )
   );
}
header('Location:../visit-listings.php');
?>
