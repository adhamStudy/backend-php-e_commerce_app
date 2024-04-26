<?php 

include "../connect.php";
$user_id = filterRequest("user_id");
$item_id = filterRequest("item_id");

$stmt = $con->prepare("SELECT COUNT(cart.cart_id) as count_items FROM `cart`
 WHERE cart_users_id = $user_id AND cart_items_id= $item_id AND cart_orders=0");
 $stmt->execute();
 
 $count= $stmt->rowCount();

 $data = $stmt->fetchColumn();
 if ($count>0){
    echo json_encode (array("status"=> "success", "data" => $data));
 }
 else {
    echo json_encode (array("status"=> "success", "data" => "0"));

 }
