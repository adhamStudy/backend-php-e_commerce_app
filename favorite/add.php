<?php 

include "../connect.php" ; 


$usersid = filterRequest("user_id") ; 
$itemsid = filterRequest("item_id") ; 


$data = array(
    "favorite_users_id"  =>   $usersid , 
    "favorite_items_id"  =>   $itemsid
);


insertData("favorite" ,$data) ; 