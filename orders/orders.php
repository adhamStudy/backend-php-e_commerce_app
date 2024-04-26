<?php 

include '../connect.php';

$userId= filterRequest("id");

// echo json_encode(array('id'=>$userId));

getAllData("orders","orders_users_id = '$userId'",null,true);