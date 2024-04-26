<?php 
// this is php for remove item from favorite

include '../connect.php';


$item_id = filterRequest("item_id");

deleteData("favorite"," favorite_id = $item_id");