<?php
session_start();
// header('refresh:3');


// connection
require "../../../db/conn_database.php";
$conn = db_config();


// header('Location: ../../../index.php');


if (isset($_POST['add_to_cart'])) {

 $author   = $_POST["hidden_author"];
 $title    = $_POST["hidden_title"];
 $image    = $_POST["hidden_image"];
 $price    = $_POST["hidden_price"];
 $qty      = $_POST["hidden_quantity"];
 $category = $_POST["hidden_category"];

 $sql_cart = mysqli_query($conn, "SELECT * FROM cart WHERE title = '$title'");

 if (mysqli_num_rows($sql_cart) > 0) {
  // add error message
 } else {
  $insert_book = mysqli_query($conn, "INSERT INTO `cart` (author, price, title, quantity, category, image)
   VALUES('$author','$price','$title','$qty','$category','$image')");
  // add success message
//   header('Location: ../../../../index.php');
 }
}


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


// retrieve cart items from the database
$sql_cart_items = mysqli_query($conn, "SELECT * FROM cart");



?>




<link rel="stylesheet" href="style-cart.css">
<div class='container'>
	<h2>Cart Items</h2>
		<div class='container-inner'>
			<div class='center list flex-column '>
				
					<?php $grandtotal = 0 ?>
					<?php if (mysqli_num_rows($sql_cart_items) > 0): 
						while ($row = mysqli_fetch_assoc($sql_cart_items)){ ?>
					<form action='./cart.php?book_id=<?php echo $row['id']; ?>' method="post">
						<div class='card flex-row open* '>
							<img src="../../../admin/<?php echo $row['image']; ?>" alt=" Book Cover" class='book'>

								<div class='flex-column info'>
						<div class='title'>title</div>
						<div class='author'><?php echo $row['title']; ?></div>
						<div class='hidden bottom summary'>
							......................
						</div>
					</div>
					<div class='flex-column info'>
						<div class='title'>author</div>
						<div class='author'><?php echo $row['author']; ?></div>
						<div class='hidden bottom summary'>
							......................
						</div>
					</div>
					<div class='flex-column info'>
						<div class='title'>price</div>
						<div class='author'><?php echo $row['price']; ?></div>
						<div class='hidden bottom summary'>
							......................
						</div>
					</div>
					<div class='flex-column info'>
						<div class='title'>catgory</div>
						<div class='author'><?php echo $row['category']; ?></div>
						<div class='hidden bottom summary'>
							......................
						</div>
					</div>
					<div class='flex-column info'>
						<div class='title'>quantity</div>
						<input class='author' type="number" name="new_quantity" min="1"
							value="<?php echo $row['quantity']; ?>">
						<div class='hidden bottom summary'>
							......................
						</div>
					</div>
					<div class='flex-column info'>
						<div class='title'>subtotal</div>
						<div class='author'>
							<?php $subtotal  = $row['price'] * $row['quantity'];
					echo $subtotal; ?>
						</div>
						<div class='hidden bottom summary'>
							......................
						</div>
					</div>
					<div class='flex-column group'>

						<div class='hidden bottom'>
							<button type="submit" class='simple bg-green' name='update'
								>update</button>
								
						
					<?php 
						if (isset($_POST['update'])) {
							$item_id    = $_GET['book_id'];
							$new_quantity = $_POST["new_quantity"];

							$sql_update = " UPDATE `cart` SET `quantity` = $new_quantity WHERE `cart`.`id` = $item_id";
							if ($conn->query($sql_update) === true) {

								$message = "Item deleted successfully";
								// Reload the page
								header("Refresh:0");

								}

							} else {
								$message = "Error deleting item: " . $conn->error;}				?>
			

							<button class='simple bg-red' name='delete'
								style="margin-top: 3px;">delete</button>
					<?php 
						if (isset($_POST['delete'])) {
							$book_id    = $_GET['book_id'];
							$sql_delete = "DELETE FROM cart WHERE id = $book_id";
							if ($conn->query($sql_delete) === true) {
								$message = "Item deleted successfully";
								// Reload the pagehttp: //
									header("Refresh:0");

								}

						} else {
								$message = "Error deleting item: " . $conn->error;}?>
				</form>

						</div>



					</div>

				</div>
	

				<?php $grandtotal+=$subtotal; }; ?>
	<?php else:echo'empty cart'; endif; ?>
				<!-- =============symm==================== -->

				<div class='card flex-row open '>
					<!-- <img src="../../../admin/<?php echo $row['image']; ?>" alt=" Book Cover" class='book'> -->

					<div style="padding-left: 4em;" class='flex-column info '>
						<div class='author'>items in your cart: <span class='title'><?php echo getCount($conn,'cart'); ?></span> </div>
						<div class='hidden bottom summary'>
							......................
						</div>
						<div class='author'>total: <span class='title'><?php echo $grandtotal ?></span> </div>
						<div class='hidden bottom summary'>
							......................
						</div>

					</div>


					<div class='hidden bottom'>
						<a href="../checkout/checkout.php"><button class='simple  bg-green' name='checkout'
							>checkout</button></a>

						<a href="../../../../"><button class='simple bg-orange'
								>continue
								shoping</button></a>
					</div>
				</div>
	</div>
	
			</div>
		</div>
</div>

<!-- summary -->

<!-- <style>
	.play {
		animation: forwards infinite 9s play;
		border: solid;
		background-position: center;
		background-image: url("../../../../images/product-item8.jpg");
		background-size: contain;
	}

	@keyframes play {
		0% {
			background-image: url("../../../../images/product-item7.jpg");
		}

		20% {
			background-image: url("../../../../images/product-item5.jpg");
		}

		60% {
			background-image: url("../../../../images/product-item6.jpg");
		}

		80% {
			background-image: url("../../../../images/product-item3.jpg");
		}
	}

</style> -->





<!-- <?php require "../../template/footer.php"; ?> -->


<script>let old = document.querySelector('.card');

	document.querySelectorAll('.card').forEach(function (card) {
		card.addEventListener('click', function () {
			if (old != null && old.classList.contains('open')) {
				old.classList.toggle('open');
			}
			this.classList.toggle('open');
			old = this;
		});
	});
</script>
