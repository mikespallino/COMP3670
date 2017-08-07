<?php
$fName = $_POST["firstName"];
$lName = $_POST["lastName"];
$email = $_POST["email"];
$msg = "This item: ".$_POST["requestedItem"]."\r\n"."has been requested by: ".$fName." ".$lName." (".$email.").\r\n";

$to = "fatherblueberries@gmail.com";
$subject = "Item Request";
$headers = "MIME-Version: 1.0\r\n".
           "Content-type: text/html; charset=iso-8859-1\r\n";

if (!mail($to,$subject,$txt,$headers)) {
    header("HTTP/1.1 500 Internal Server Error");
}

require_once('config.php');

    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

    $error = mysqli_connect_error();
    if($error != null) {
        $output = "<p>Unable to connect to database</p>".$error;
        echo $output;
        die();
        header("HTTP/1.1 500 Internal Server Error");
    } else {
        $sql = "UPDATE fbb.store_requests ".
        "SET num_of_requests = (num_of_requests + 1) ".
        "WHERE item_id = ".$_POST["requestedItemId"];
        $result = mysqli_query($conn, $sql);
        if (!mysqli_commit($conn)) {
            echo "<p>Transaction commit failed</p>";
            header("HTTP/1.1 500 Internal Server Error");
            exit();
        }
        mysqli_close($conn);
    }
?>