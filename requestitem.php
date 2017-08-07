<?php
$fName = $_POST["firstName"];
$lName = $_POST["lastName"];
$email = $_POST["email"];
$msg = "This item has been requested: ".$_POST["requestedItem"];

$to = "fatherblueberries@gmail.com";
$subject = "Item Request";
$txt = "Name: ".$fName." ".$lName." \n\n".$msg;
$headers = "MIME-Version: 1.0\r\n".
           "Content-type: text/html; charset=iso-8859-1\r\n".
           "From: " . $email."\r\n";

if (!mail($to,$subject,$txt,$headers)) {
    header("HTTP/1.1 500 Internal Server Error");
}

require_once('config.php');

    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

    $error = mysqli_connect_error();
    if($error != null) {
        $output = "<p>Unable to connect to database</p>".$error;
        header("HTTP/1.1 500 Internal Server Error");
        exit($output);
        die();
    } else {
        $sql = "UPDATE fbb.store_requests ".
        "SET num_of_request = num_of_request+1".
        "WHERE item_id = ".$_POST["requestedItemId"];
        $result = mysqli_query($conn, $sql);
        if (!$mysqli->commit()) {
            echo "<p>Transaction commit failed</p>";
            header("HTTP/1.1 500 Internal Server Error");
            exit();
        }
        $mysqli->close();
    }
?>