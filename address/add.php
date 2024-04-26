<?php 

include "../connect.php";

$user_id      = filterRequest('user_id');
$address_name = filterRequest('address_name');
$city         = filterRequest('city');
$street       = filterRequest('street'); 
$lat          = filterRequest('lat');
$lang         = filterRequest('lang');

$data = array( 
    "address_user_id" => $user_id,
    "address_city" => $city,
    "address_street" => $street,
    "address_lat" => $lat,
    "address_lang" => $lang,
    "address_name" => $address_name
  );

  insertData("address", $data);
  // getAllData("address");
  // echo json_encode(array("data"=> $data) );

