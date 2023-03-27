<?php
session_start();
require "../../../db/conn_database.php";
require_once "../../template/header.php";

 // header('Location: ../../../index.php');

$conn = db_config();

if (isset($_POST['add_to_cart'])) {

$author      =    $_POST["hidden_author"];
$price       =    $_POST["hidden_price"];
$title       =    $_POST["hidden_title"];
$qty         =    $_POST["hidden_quantity"];
$category    =    $_POST["hidden_category"];
$image       =    $_POST["hidden_image"];
            


 $sql_cart = mysqli_query($conn, "SELECT * FROM cart WHERE title = '$title'");

 if (mysqli_num_rows($sql_cart) > 0) {
  // add error message
 } else {
  $insert_book = mysqli_query($conn, "INSERT INTO `cart` (author, price, title, quantity, category, image)
   VALUES('$author','$price','$title','$qty','$category','$image')");
  // add success message
 }
}

// retrieve cart items from the database
$sql_cart_items = mysqli_query($conn, "SELECT * FROM cart");

?>


<title>Shopping Cart</title>
<link rel="stylesheet" href="cart.css">
<body >
<h1>Shopping Cart</h1>

<main>

	<div class="basket">
		<div class="basket-labels">
			<ul>
				<li class="item item-heading">Item</li>
				<li class="price">Price</li>
				<li class="quantity">Quantity</li>
				<li class="subtotal">Subtotal</li>
			</ul>
		</div>


<?php $grandtotal=0 ?>
<?php if (mysqli_num_rows($sql_cart_items) > 0): ?>
		<?php while ($row = mysqli_fetch_assoc($sql_cart_items)){ ?>

		<div class="basket-product">
			<div class="item">
				<div class="product-image">
					<img src="../../../admin/<?php echo $row['image']; ?>" alt="book" class="product-frame">
				</div>
				<div class="product-details">
					<h2><strong><?php echo $row['title'];?></strong></h2>
					<p><Span>Author </Span><?php echo $row['author']; ?></p>
					<p><Span>category </Span><?php echo $row['category']; ?></p>
				</div>
			</div>

			<div class="price"><?php echo $row['price']; ?></div>
			<div class="quantity">
				<form action='cart.php?update=<?php echo $row['id']; ?>' method="post">

					<button type="submit" name="update">update</button>
				<input type="number" name="new_quantity" value='<?php echo $row['quantity'];?>'>
					<?php 
						if (isset($_POST['update'])) {

							$item_id    = $_GET['update'];
							$new_quantity = $_POST["new_quantity"];

							$sql_update = " UPDATE `cart` SET `quantity` = $new_quantity WHERE `cart`.`id` = $item_id";
							if ($conn->query($sql_update) === true) {

								$message = "Item deleted successfully";
								// Reload the page
								}

						} else {
								$message = "Error deleting item: " . $conn->error;
	}
	}				?>
				</form>
			</div>



			<div class="subtotal">
				<?php $subtotal = $row['price'] * $row['quantity'] ;
        			echo $subtotal;?></div>


			<div class="remove">
				<form action='add_to_cart.php?item_id=<?php echo $row['id']; ?>' method="post">

					<button type="submit" name="delete">Remove</button>
					<?php 
						if (isset($_POST['delete'])) {
							$item_id    = $_GET['item_id'];
							$sql_delete = "DELETE FROM cart WHERE id = $item_id";
							if ($conn->query($sql_delete) === true) {
								$message = "Item deleted successfully";
								// Reload the page
								}

						} else {
								$message = "Error deleting item: " . $conn->error;}?>
				</form>
			</div>
		</div>
		<?php $grandtotal+=$subtotal; endwhile; ?>
	</div>
	
	<?php else: header('Location: ../../../index.php'); endif; ?>



	<aside>
		<div class="summary">
			<div class="summary-total-items"><span class="total-items"></span> Items in your Bag</div>
			<div class="summary-subtotal">
				<div class="subtotal-title">Subtotal</div>
				<div class="subtotal-value final-value" id="basket-subtotal">130.00</div>
				<div class="summary-promo hide">
					<div class="promo-title">Promotion</div>
					<div class="promo-value final-value" id="basket-promo">sd</div>
				</div>
			</div>
			<div class="summary-delivery">
				<select name="delivery-collection" class="summary-delivery-selection">
					<option value="0" selected="selected">Select Collection or Delivery</option>
					<option value="collection">Collection</option>
					<option value="first-class">Royal Mail 1st Class</option>
					<option value="second-class">Royal Mail 2nd Class</option>
					<option value="signed-for">Royal Mail Special Delivery</option>
				</select>
			</div>
			<div class="summary-total">
				<div class="total-title">Total</div>
				<div class="total-value final-value" id="basket-total"><?php echo $grandtotal; ?></div>
			</div>
			<div class="summary-checkout">
				<button class="checkout-cta">Go to Secure Checkout</button>
			</div>
		</div>
	</aside>
</main>
</body>
<!-- <script src="./add_to_cart.js"></script> -->

</html>


