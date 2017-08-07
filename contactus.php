<?php

$fName = $_POST["firstName"];
$lName = $_POST["lastName"];
$email = $_POST["email"];
$msg = "This email is from: ".$email.
       "\r\n\r\n".$_POST["msg"];

$to = "fatherblueberries@gmail.com";
$subject = "Contact Us";
$txt = "Name: ".$fName." ".$lName." \n\n".$msg;
$headers = "MIME-Version: 1.0\r\n".
           "Content-type: text/html; charset=iso-8859-1\r\n";

if (!mail($to,$subject,$txt,$headers)) {
    header("HTTP/1.1 500 Internal Server Error");
}
?>