<?php 
include "../connect.php";

$address_id = filterRequest('address_id');
$address_name = filterRequest('address_name');
$city = filterRequest('city');
$street = filterRequest('street');
$lat = filterRequest('lat');
$Lang = filterRequest('Lang');



$table = "address";

$data = array(

    "address_ciry" => $city,
    "address_street" => $street,
    "address_lat	" => $lat,
    "address_lang" => $lang,
    "address_name" => $address_name,
  );
updateData($table , $data,"address_id= $address_id");