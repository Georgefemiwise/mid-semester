<?php // connection
require "../../../db/conn_database.php";
$conn = db_config();
// header('refresh:3');

//get totall in cart count
function getCount($conn, $table)
{
 $query  = "SELECT COUNT(*) FROM $table";
 $result = mysqli_query($conn, $query);

 if ($result) {
  $row   = mysqli_fetch_row($result);
  $count = $row[0];
 } else {
  echo "Can't retrieve data " . mysqli_error($conn);
  exit;
 }
 return $count;
}
?>

<!DOCTYPE html>
<html>

	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="style_checkout.css">
	</head>

	<body>
		<h2> Checkout Form</h2>
		<p>pls use the form bellow </p>
		<div class="row">
			<div class="col-75">
				<div class="container">
					<form action="../confirm/confirm.php" method="post">
						<div class="row">
							<div class="col-50">

								<h3>Billing Address</h3>
								<label for="fname"><i class="fa fa-user"></i> Full Name</label>
								<input required type="text" id="fname" name="firstname" placeholder="John M. Doe">
								<label for="email"><i class="fa fa-envelope"></i> Email</label>
								<input required type="text" id="email" name="email" placeholder="john@example.com">
								<label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
								<input required type="text" id="adr" name="address" placeholder="542 W. 15th Street">
								<label for="city"><i class="fa fa-institution"></i> City</label>
								<input required type="text" id="city" name="city" placeholder="New York">

								<div class="row">
									<div class="col-50">
										<label for="region">Region</label>
										<input required type="text" id="region" name="region" placeholder="WR">
									</div>
									<div class="col-50">
										<label for="zip">Zip</label>
										<input required type="text" id="zip" name="zip" placeholder="10001">
									</div>
								</div>
							</div>

							<div class="col-50 ">
								<h3>Payment</h3>
								<div class="row">
									<div class="col-25">
										<label>
											<input type="radio" name="method" id="cash"> Pay with cash
										</label>
									</div>
									<div class="col-25">
										<label>
											<input type="radio" name="method" id="cc"> Credit Card
										</label>
									</div>
								</div>
								<div class="col-50 credit_card ">

									<p style="color:#ff1414; font-size: smaller; font-style: italic;">Due to security reason we dont accept credit cards</p>
									<label for="cname">Name on Card</label>
									<input type="text" id="cname" name="cardname" placeholder="John More Doe"
										disabled>
									<label for="ccnum">Credit card number</label>
									<input type="text" id="ccnum" name="cardnumber"
										placeholder="1111-2222-3333-4444" disabled>
									<label for="expmonth">Exp Month</label>
									<input type="text" id="expmonth" name="expmonth" placeholder="September"
										disabled>
									<div class="row">
										<div class="col-50">
											<label for="expyear">Exp Year</label>
											<input type="text" id="expyear" name="expyear" placeholder="2018"
												disabled>
										</div>
										<div class="col-50">
											<label for="cvv">CVV</label>
											<input type="text" id="cvv" name="cvv" placeholder="352"
												disabled>
											<input type="hidden" name="payment_method"
												value="cash on delivery">
										</div>
									</div>
								</div>

								<div class="col-50 cash hidden">
									<p>Cash on delivery</p>
								</div>
							</div>
						</div>
						<input type="submit" name="confirm" value="Continue to checkout" class="btn bg-green-btn">
				</div>
			</div>



			<div class="col-25">
				<div class="container">
					<h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i>
							<b><?php echo getCount($conn, 'cart') ?></b></span></h4>
<?php
// retrieve cart items from the database
$sql_cart_items = mysqli_query($conn, "SELECT * FROM cart");
$orders         = array();
$grandtotal     = 0;
if (mysqli_num_rows($sql_cart_items) > 0) {
 while ($row = mysqli_fetch_assoc($sql_cart_items)) {
  ?>
        <div class="cart-item">
            <p class="title"><?php echo $row['title']; ?></p>
            <p class="price"><?php echo $row['price']; ?></p>
          
        </div>
        <?php
$grandtotal += $row['price'] * $row['quantity'];
  array_push($orders, $row['title'] . ' (' . $row['quantity'] . ')');
 }
}
?>

<p>Total <span class="price" style="color:black"><b>ghs <?php echo $grandtotal; ?> </b></span></p>

<a href="../cart/cart.php" class="btn bg-green-btn">back to cart</a>
<a href="../../../../index.php" class="btn bg-orange-btn">shop more</a>

<input type="hidden" name="totalcost" value="<?php echo $grandtotal; ?> ">
<input type="hidden" name="orders" value="<?php echo implode(', ', $orders); ?>">

				</div>
			</div>
			</form>

		</div>

	</body>

</html>
<ul>
	<?php foreach ($orders as $key => $value) {

  echo "<li>$value</li>";

}  ?>
</ul>

<script>
	const cash = document.getElementById('cash')
	const creditCard = document.getElementById('cc')

	cash.addEventListener('click', (e) => {
		document.querySelector('.cash').classList.remove('hidden')
		document.querySelector('.credit_card').classList.add('hidden')
	})
	creditCard.addEventListener('click', (e) => {
		document.querySelector('.cash').classList.add('hidden')
		document.querySelector('.credit_card').classList.remove('hidden')
	})
</script>
