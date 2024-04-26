<?php 
include "../connect.php";
$user_id=filterRequest("user_id");
$item_id=filterRequest("item_id");
$data= getAllData('cart_view','1=1',null,false);

$stmt= $con->prepare("SELECT SUM(total_price) as total_price, SUM(count_items) as item_count from cart_view
WHERE cart_users_id =$user_id AND cart_orders=0
GROUP BY cart_users_id");
$stmt->execute();

$dataCountPrice = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode(array("status"=> "success",
"data_cart"=> $data,
"count_price"=>$dataCountPrice
));
