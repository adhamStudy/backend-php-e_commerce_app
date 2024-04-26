<?php 
// this is php for remove item from favorite

include '../connect.php';

$user_id = filterRequest("user_id");
$item_id = filterRequest("item_id");

deleteData("favorite", "favorite_users_id = $user_id AND favorite_items_id = $item_id");