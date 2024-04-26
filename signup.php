<?php

include "../connect.php";

$username = filterRequest("username");
$password = sha1("password");
$email = filterRequest("email");
$phone = filterRequest("phone");
$verfiycode  =rand(10000,99999);

$stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? OR users_phone = ? ");
$stmt->execute(array($email, $phone));
$count = $stmt->rowCount();
if ($count > 0) {
    printFailure("PHONE OR EMAIL");
} else {

    $data = array(
        "users_name" => $username,
        "users_password" =>  $password,
        "users_email" => $email,
        "users_phone" => $phone,
        "users_verify_code" =>$verfiycode,
    );
    $to ="$email";
    $title ="verificaion code";
    $body="this is verificaion code $verfiycode";
    $header =" from adhmalslahy@gmail.com ";
    mail($to ,$title,$body,$header);

    insertData("users" , $data) ; 
    
    
    // sendEmail($email , "Verify Code Ecommerce " , "Your Verify Code is : $verfiycode") ;

}