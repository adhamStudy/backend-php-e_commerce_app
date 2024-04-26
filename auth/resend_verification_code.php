<?php 
include "../connect.php";

$email = filterRequest("email");
$verfiycode = rand(10000, 99999);

$count = getAllData("users", "users_email = '$email' ",null,false);

if ($count > 0) {
    $data = array(
        "users_verify_code" => $verfiycode,
    );
    updateData("users", $data, "users_email = '$email'",false);
    
    $to = $email;
    $title = "Verification Code";
    $body = "This is your verification code: $verfiycode";
    $header = "From: adhmalslahy@gmail.com ";
    mail($to, $title, $body, $header);
    getAllData("users", "users_email = '$email' ",null,true);
}