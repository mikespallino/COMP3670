<h1 class="page-title">Shop</h1>

<?php
    require_once('config.php');

    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

    $error = mysqli_connect_error();
    if($error != null) {
    	$output = "<p>Unable to connect to database</p>".$error;
    	exit($output);
    } else {
    	$sql = "SELECT item_name, item_img_path, price FROM fbb.store_items WHERE quantity > 0";
	$result = mysqli_query($conn, $sql);
	if($result-> num_rows > 0) {
	    echo "<table border='1px' class='table table-bordered'><tr><th colspan='2'>Item</th><th>Price</th></tr>";
	    while($row = $result-> fetch_assoc()) {
		    echo "<tr><td><img src='".$row['item_img_path']."'/></td><td>".$row['item_name']."</td><td>".$row['price']."</td></tr>";
	    }
	    echo "</table>";
        }
    }
?>
