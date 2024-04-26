<?php 
include "../connect.php";
$user_id = filterRequest("user_id");
$item_id = filterRequest("item_id");


$conut= getData("cart", "cart_users_id = $user_id AND cart_items_id = $item_id AND cart_orders=0",null,false);
if ($conut > 0) {
  $data = array(
    "cart_users_id" => $user_id,
    "cart_items_id" => $item_id
  );
} else {
  $data = array(
    "cart_users_id" => $user_id,
    "cart_items_id" => $item_id
  );
    
}
insertData("cart", $data);