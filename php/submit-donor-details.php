<?php
include '../connect.php';

if(isset($_GET["app"])){
    if(isset($_GET['_id'])){
        $details = array(
            "name"=>$_POST["name"],
            "flat_no"=>$_POST['flat_no'],
            "building"=>$_POST['building'],
            "address"=>$_POST["address"],
            "latitude"=>$_POST["latitude"],
            "longitude"=>$_POST["longitude"],
            "contact"=>$_POST["contact"],
            "location"=>$_POST["location"]
        );
        echo 'hi';
        $db->donors->update(array("_id"=>new MongoId($_GET['_id'])), array('$set'=>$details));
    }
    else{
        $details = array(
            "name"=>$_POST["name"],
            "flat_no"=>$_POST['flat_no'],
            "building"=>$_POST['building'],
            "address"=>$_POST["address"],
            "latitude"=>$_POST["latitude"],
            "longitude"=>$_POST["longitude"],
            "contact"=>$_POST["contact"],
            "status"=>"0",
            "location"=>$_POST["location"]
        );
        $db->donors->insert($details);
    }
    //header('Location:../donor-listings.php');
}
else{
    $json = json_decode(file_get_contents('php://input'), true);
    $response = "";
    $passhashed = password_hash($json['pass'], PASSWORD_BCRYPT);
    $flag = 12;
    try{
        if($db->donors->createIndex(array('email'=>1), array('unique' => true, 'sparse' => true))){
            $db->donors->insert(array(
                'email' => $json['user'],
                'password' => $passhashed,
                'name' => $json['name'],
                "flat_no" => $json['flat_no'],
                "building" => $json['building'],
                "address" => $json["address"],
                "contact" => $json["contact"],
                "location" => $json["location"]
            ));
        }
        else {
            $flag = 0;
        }
    }
    catch(MongoCursorException $me){}
        catch(MongoDuplicateKeyException $md){}

            $arr = array();
            if($flag == 0){
                $arr['response'] = "false";
            }
            else{
                $temp = $db->donors->findOne(array("email"=>$json['user']));
                $arr['response'] = strval($temp["_id"]);
            }
            echo json_encode($arr);
        }
        ?>
