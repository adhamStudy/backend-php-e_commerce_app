<?php

include "../connect.php";


$email = filterRequest("email");
$password = sha1($_POST["password"]);

// $verfiycode  =rand(10000,99999);

// $stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? AND users_password = ? AND users_approve =1 ");
// $stmt->execute(array($email, $password));
// $count = $stmt->rowCount();
getData("users","users_email = ? AND users_password = ? AND users_approve = 1",array($email,$password));

// result($count);



