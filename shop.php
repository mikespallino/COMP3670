<h1 class="page-title" style="font-family: 'Amatic SC';">Shop</h1>

<?php
    require_once('config.php');

    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

    $error = mysqli_connect_error();
    if($error != null) {
    	$output = "<p>Unable to connect to database</p>".$error;
    	exit($output);
    } else {
    	$sql = "SELECT * FROM fbb.store_items WHERE display_item = true";
	$result = mysqli_query($conn, $sql);
	if($result-> num_rows > 0) {
	    echo "<div class=\"shop-page\">";
	    while($row = $result-> fetch_assoc()) {
		   echo "<div class=\"shop-block\"> <div class=\"shop-top\"><span class=\"shop-item\">".$row["item_type"]."</span></div><div class=\"shop-middle\"><img src=\"".$row['item_img_path']."\" alt=\"item\" /></div><div class=\"shop-bottom\"><div class=\"shop-heading\">".$row['item_name']."</div>";
	       if($row['item_info'] != '') {
            echo "<div class=\"shop-info\">".$row['item_info']."</div>";
           }
           if($row['item_style'] != '') {
            echo "<div class=\"shop-style\">".$row['item_style']."</div>";
           }
           if($row['quantity'] > 0) {
             echo "<div class=\"shop-price\">$".$row['price']."</div>";
           } else {
            echo "<div class=\"shop-price\">$".$row['price']." <span class=\"shop-out-of-stock\">Out of stock!</span></div>";
           }
           echo "</div></div>";
        }
	    echo "</div>";
        }
    }
?>