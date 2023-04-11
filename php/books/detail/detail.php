<?php

// header('refresh:3');
$book = $_GET['detail'];

require_once "../../db/conn_database.php";

$conn = db_config();

$query  = "SELECT * FROM book WHERE id = '$book'";
$result = mysqli_query($conn, $query);
if (!$result) {
      echo "Can't retrieve data " . mysqli_error($conn);
      exit;
}

$row = mysqli_fetch_assoc($result);
if (!$row) {
      echo "Empty book";
      exit;
}

// rating counter
function countNumberInArray($array, $number)
{
      $count = 0;
      foreach ($array as $value) {
            if ($value === $number) {
                  $count++;
            }
      }
      return $count;
}

$array = [1, 2, 3, 4, 5, 3, 3, 2, 1, 3, 5, 3, 2, 2, 2, 5, 5, 4, 3, 2, 1];

$count = countNumberInArray($array, 1);

?>




<title> <?php echo $row['title']; ?> details</title>
<link rel="stylesheet" href="style_detail.css">

<form method="post" action="../orders/cart/cart.php">
	<div class="card-wrapper">
		<div class="card">
			<!-- card left -->
			<div class="img-cover">
				<img src="../../admin/<?php echo $row['image']; ?>" alt="shoe image">
			</div>

			<!-- card right -->
			<div class="product-content">
				<h2 class="product-title"><?php echo $row['title']; ?></h2>


				<div class="product-price">
          <div class="ul">
					<p class="price">Price: <span>$<?php echo $row['price']; ?></span></p>	
					
						<p>Genre: <span><?php echo $row['category']; ?></span></p>
					</div>
				</div>

				<hr>

				<div class="product-detail">
					<h2>about this Book: </h2>
					<p><?php echo $row['description']; ?></p>

					<div class="product-rating">

						<div class="5">
							<svg width=20 viewBox="0 0 576 512">
								<path fill='pink'
									d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
							</svg>
							<span>(5)</span>
						</div>

						<div class="4">
							<svg width=20 viewBox="0 0 576 512">
								<path fill='pink'
									d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
							</svg>
							<span>(4)</span>
						</div>

						<div class="3">
							<svg width=20 viewBox="0 0 576 512">
								<path fill='pink'
									d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
							</svg>
							<span>(3)</span>
						</div>

						<div class="2">
							<svg width=20 viewBox="0 0 576 512">
								<path fill='pink'
									d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
							</svg>
							<span>(2)</span>
						</div>

						<div class="1">
							<svg width=20 viewBox="0 0 576 512">
								<path fill='pink'
									d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
							</svg>
							<span>(1)</span>
						</div>






					</div>
				</div>



				<input type="hidden" name="hidden_author" value="<?php echo $row['author']; ?>">
				<input type="hidden" name="hidden_price" value="<?php echo $row['price']; ?>">
				<input type="hidden" name="hidden_title" value="<?php echo $row['title']; ?>">
				<input type="hidden" name="hidden_category" value="<?php echo $row['category']; ?>">
				<input type="hidden" name="hidden_image" value="<?php echo $row['image']; ?>">

				<div class="purchase-info">
					<input type="number" min="1" value="1" name="hidden_quantity">
					<button type="submit" class="btn" name="add_to_cart">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
							<path
								d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20h44v44c0 11 9 20 20 20s20-9 20-20V180h44c11 0 20-9 20-20s-9-20-20-20H356V96c0-11-9-20-20-20s-20 9-20 20v44H272c-11 0-20 9-20 20z" />
						</svg>
						Add to Cart
					</button>

				</div>

			</div>

		</div>
</form>
