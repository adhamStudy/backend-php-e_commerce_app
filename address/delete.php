<?php 
include "../connect.php";

$address_id=filterRequest("address_id");

deleteData("address", "address_id= $address_id");