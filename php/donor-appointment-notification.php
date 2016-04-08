<?php
require_once('php-master/composer/lib/autoloader.php');
include '../connect.php';
use Pubnub\Pubnub;
$pubnub = new Pubnub('pub-c-5a446557-7eb7-4edb-9ef9-50ad86c4d4bd', 'sub-c-141cdffa-faea-11e5-8b0b-0619f8945a4f');
$donors = $db->visit_list->find(array("date"=> date('Y-m-d')));
$message = "We have scheduled a collection appointment for you today, please confirm your presence using your app. Incase of absence of collector please notify us for the same. Thank You!";
foreach ($donors as $donor) {
   foreach ($donor['donors'] as $donr) {
      $publish_result = $pubnub->publish(strval($donr["_user_id"]), $message);
      print_r($publish_result);
   }
}
?>
