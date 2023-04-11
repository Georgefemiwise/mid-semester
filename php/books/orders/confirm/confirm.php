 <?php
 

require "../../../db/conn_database.php";
$conn = db_config();

 if (isset($_POST["confirm"])) {
 
 $firstname = $_POST["firstname"];
 $email = $_POST["email"];
 $address = $_POST["address"];
 $city = $_POST["city"];
 $region = $_POST["region"];
 $zip = $_POST["zip"];
 $method = $_POST["payment_method"];
 $order = $_POST["orders"];
 $total_cost = $_POST["totalcost"];



$query_order = "INSERT INTO `orders` (`buyer_name`, `buyer_email`, `buyer_address`, `buyer_city`, `buyer_region`, `buyer_zip_code`, `buyer_payment_method`, `orders`, `order_total_cost`) 
			VALUES ('$firstname', '$email', '$address', '$city', '$region', '$zip', '$method', '$order', '$total_cost');"; 
 $insert_orders = mysqli_query($conn, $query_order);
 if ($insert_orders) {
	// SQL query to delete all instances from the table
		$sql_empty_cart = "DELETE FROM cart";

		// Execute the query
		if (mysqli_query($conn, $sql_empty_cart)) 
echo "<script>alert('your orders is been processed thank you for buying with us')</script>";
header('location: ../../../../');
 }

 }
?>












