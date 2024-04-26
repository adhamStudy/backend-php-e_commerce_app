<?php 

include "../connect.php";

$users_id= filterRequest('user_id');
$address_id= filterRequest('address_id');
$orders_type= filterRequest('orders_type');
$price_delivery= filterRequest('price_delivery');
$orders_price= filterRequest('orders_price');
$coupon_id= filterRequest('coupon_id');
$payment_method= filterRequest('payment_method');
$couponDiscount= filterRequest('discount');


$price_delivery=doubleval($price_delivery);
$orders_price=doubleval($orders_price);
$couponDiscount=intval($couponDiscount);


$now = date("Y-m-d H:i:s");

$totalPrice=$orders_price+$price_delivery;

$checkoutCoupon =getData("coupon","coupon_id='$coupon_id' AND coupon_expiredate > '$now' AND coupon_count >0 ",null,false);

if ($checkoutCoupon>0){ 

    $totalPrice= $totalPrice-$totalPrice* $couponDiscount/100;
}

$data = array(
    "orders_users_id"=> $users_id,
    "orders_address"=> $address_id,
    "orders_price"=> $orders_price,
    "orders_type"=> $orders_type,
    "orders_coupon"=> $coupon_id,
    "orders_payment_method"=> $payment_method,
    "orders_totalprice"=> $totalPrice,

);

$count =insertData("orders",$data,false);
// echo json_encode(array('count'=>$count));

if ($count >0){
    $stmt = $con->prepare("SELECT MAX(orders_id) FROM `orders` ");
    $stmt->execute();
    $maxId= $stmt->fetchColumn();
    $data = array(
        "cart_orders"=>$maxId
    );
    updateData("cart",$data,"cart_users_id=$users_id AND cart_orders = 0 ");
}
