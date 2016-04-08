<?php
include '../connect.php';
$items = $db->collectors->find(
    array(),
    array(
        "name"=>1,
        "password"=>1,
        "_id"=>0
    )
);

echo json_encode(iterator_to_array($items), JSON_PRETTY_PRINT);
?>
