<?php
include "../../connect.php";
$email = filterRequest("email");

$verfiycode= rand(10000, 99999);

$stmt = $con->prepare("SELECT * FROM users WHERE `users_email` = ?");
$stmt->execute(array($email));
$count = $stmt->rowCount();
result($count);

if ($count > 0) {
    $data = array("users_verify_code" => $verfiycode);
    updateData("users", $data, "users_email = '$email'", false);
    $to ="$email";
    $title ="verificaion code";
    $body="this is verificaion code $verfiycode";
    $header =" from adhmalslahy@gmail.com ";
    mail($to ,$title,$body,$header);
}
// include "../connect.php" ; 
// $to ="adhmalslahy@gmail.com";
// $title ="hi";
// $body="im adham";
// $header =" from adhmalslahy@gmail.com ";
// mail($to ,$title,$body,$header);

// echo json_encode(array("status" => "success", "Hello "=> "world"));
//ftp://phptrainu4e@170.249.238.154/public_html/

// include "connect.php" ; 
// $to ="adhmalslahy@gmail.com";
// $title ="hi";
// $body="im adham";
// $header =" from adhmalslahy@gmail.com ";
// mail($to ,$title,$body,$header);

// echo json_encode(array("status" => "success"));
