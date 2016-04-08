<?php
include '../connect.php';
$dbName = $_POST['dbName'];
$ids = explode(',', $_POST['id']);
if($dbName == 'donors'){
   $friendCollection = $m->selectCollection("mesco", "donors");
}
else if($dbName == 'collectors'){
   $friendCollection = $m->selectCollection("mesco", "collectors");
}
else if($dbName == 'events'){
   $friendCollection = $m->selectCollection("mesco", "events");
}
try {
   foreach ($ids as $value) {
      if($value != 'on'){
         $friendCollection->remove(array("_id"=>new MongoId($value)),array("safe" => true));
         echo 'success';
      }
   }
}
catch (MongoCursorException $mce) {
   // Triggered when the insert fails
   echo 'insertFail';
}
catch (MongoCursorTimeoutException $mcte) {
   // Triggered when insert does not complete within value given by timeout
   echo 'valueIncorrect';
} // end try -catch
?>
