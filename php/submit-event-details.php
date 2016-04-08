<?php
include '../connect.php';
$uploaddir = 'C:\wamp\www\mesco/php/images/';
$uploadfile = $uploaddir.basename($_FILES['image']['name']);
if(isset($_GET["update"])){
   $event = $db->events->findOne(array("_id"=>new MongoId($_GET["_id"])));
   if(isset($_FILES['image']) && $_FILES['image']['error'] != 4){
      echo '<pre>';
      if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
          echo "File is valid, and was successfully uploaded.\n";
      } else {
          echo "Possible file upload attack!\n";
      }

      echo 'Here is some more debugging info:';
      print_r($_FILES);
      print "</pre>";
      unlink($event["image"]);
      $db->events->update(array("_id"=>new MongoId($_GET["_id"])),array("title"=>$_POST["title"], "description"=>$_POST["desc"],"start_date"=>$_POST["start-date"],"end_date"=>$_POST["end-date"],"image"=>"images/".$_FILES['image']['name']));
   }
   else{
      $temp = $db->events->findOne(array("_id"=>new MongoId($_GET["_id"])));
      $db->events->update(array("_id"=>new MongoId($_GET["_id"])),array("title"=>$_POST["title"], "description"=>$_POST["desc"],"start_date"=>$_POST["start-date"],"end_date"=>$_POST["end-date"],"image"=>$temp["image"]));
   }
}
else{
   echo '<pre>';
   if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
       echo "File is valid, and was successfully uploaded.\n";
   } else {
       echo "Possible file upload attack!\n";
   }

   echo 'Here is some more debugging info:';
   print_r($_FILES);
   print "</pre>";
   $db->events->insert(array("title"=>$_POST["title"], "description"=>$_POST["desc"],"start_date"=>$_POST["start-date"],"end_date"=>$_POST["end-date"],"image"=>"images/".$_FILES['image']['name']));
}
header("Location:../view-events.php");
?>
