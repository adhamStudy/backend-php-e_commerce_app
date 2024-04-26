<?php 
include "../connect.php";

$coupon_name=filterRequest('coupon_name');

$now = date("Y-m-d H:i:s");

getData("coupon","coupon_name='$coupon_name' AND coupon_expiredate > '$now' AND coupon_count > 0  ");