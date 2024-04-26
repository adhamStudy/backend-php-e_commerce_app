<?php 
include "../connect.php";
$email = filterRequest("email");
$code = filterRequest("verify_code");

$stmt = $con->prepare("SELECT * FROM `users` WHERE `users_email` = ? AND `users_verify_code` = ? ");
$stmt->execute(array($email, $code));
$count = $stmt->rowCount();
if ($count > 0) {
    $data = array(
        "users_approve" => 1,
    );
    updateData("users", $data, "users_email = '$email'");
    
} else {
   printFailure("VERIFY CODE not correct !!");
}