<?php

$fName = $_POST["firstName"];
$lName = $_POST["lastName"];
$email = $_POST["email"];
$msg = $_POST["msg"];

$to = "fatherblueberries@gmail.com";
$subject = "Contact Us";
$txt = "Name: ".$fName." ".$lName." \n\n".$msg;
$headers = "From: " . $email."\r\n";

mail($to,$subject,$txt,$headers);

?>