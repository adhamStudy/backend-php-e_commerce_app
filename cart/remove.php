<?php 
include "../connect.php";

$user_id = filterRequest("user_id");
$item_id = filterRequest("item_id");

deleteData("cart", "cart_id =(
  SELECT cart_id FROM cart WHERE cart_users_id = $user_id AND cart_items_id = $item_id AND cart_orders=0 LIMIT 1
)");