<?php 
include "../connect.php";
$orderId=filterRequest("orderId");
$usersId=filterRequest("users_id");
$data = array("orders_status"=>1);
updateData("orders",$data,"orders_id= $orderId AND orders_status=0");

sendGCM("Sucess","The order has been approved","users$usersId","none","none");


