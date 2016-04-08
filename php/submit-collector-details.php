<?php
include '../connect.php';
if($_GET['update'] == 1){
   $details = array(
       "name"=>$_POST["name"],
       "password" => $_POST["password"],
       "address"=>$_POST["address"],
       "contact"=>$_POST["contact"]
   );

   $db->collectors->update(
   array(
       "_id"=>new MongoId($_GET['_id'])),
       array(
           '$set'=>$details
       )
   );

}
else{
   $details = array(
       "name"=>$_POST["name"],
       "password" => $_POST["password"],
       "address"=>$_POST["address"],
       "contact"=>$_POST["contact"]
   );
   $db->collectors->insert($details);
}
header('Location:../collector-listings.php');
?>
