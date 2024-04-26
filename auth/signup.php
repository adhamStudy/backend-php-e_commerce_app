<?php

include "../connect.php";

$username = filterRequest("username");
$password = sha1($_POST["password"]);
$email = filterRequest("email");
$phone = filterRequest("phone");
$verfiycode = rand(10000, 99999);

$stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? AND users_approve = 0");
$stmt->execute(array($email));
$count = $stmt->rowCount();

if ($count > 0) {
    $stmt = $con->prepare("DELETE FROM users WHERE users_email = ? AND users_approve = 0");
    $stmt->execute(array($email));
}

$stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? OR users_phone = ?");
$stmt->execute(array($email, $phone));
$count = $stmt->rowCount();

if ($count > 0) {
    printFailure("PHONE OR EMAIL");
} else {
    $data = array(
        "users_name" => $username,
        "users_password" => $password,
        "users_email" => $email,
        "users_phone" => $phone,
        "users_verify_code" => $verfiycode,
    );
    
    $to = $email;
    $title = "Verification Code";
    $body = "This is your verification code: $verfiycode";
    $header = "From: adhmalslahy@gmail.com";
    mail($to, $title, $body, $header);

    insertData("users", $data);

    // sendEmail($email , "Verify Code Ecommerce " , "Your Verify Code is : $verfiycode") ;
}