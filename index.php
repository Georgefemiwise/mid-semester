<?php

require "./php/books/template/header.php";
// require "./php/db/conn_database.php";
$conn = db_config();

$query  = "SELECT * FROM book ORDER BY abs(unix_timestamp(created_at)) DESC";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
?>




<link rel="stylesheet" href="index.css">
<link rel="stylesheet" href="./index.css">





<div class='container'>
	<form action="php/books/orders/cart/cart.php" method="POST">
			<div class='center list flex-column '>
				
				<?php while ($row = mysqli_fetch_array($result)) { ?>

					<div class='card flex-row '>
						<img src="php/admin/<?php echo $row['image']; ?>" alt="Book Cover" class='book'>
						<div class='flex-column info'>
							<div class='title'><?php echo $row['title']; ?></div>
							<div class='author'><?php echo $row['author']; ?></div>
							<div class='author'>&starf;&starf;&starf;&star;&star;</div>
							<div class='hidden bottom'><?php echo substr($row['description'], 0, 300).'...' ?></div>
							<div class='hidden bottom'>
								<a  href="php/books/detail.php?detail=<?php echo $row['id']; ?>" style="border:1px solid #ffff00bc; margin-top:7px; background:transparent
;" class='simple'>view</a>
								<button type="submit"  class='simple'  name="addToCart"><svg width="20" height="20"
										fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M3.6 1.2a1.2 1.2 0 0 0 0 2.4h1.464l.366 1.466.012.05 1.63 6.517L6 12.703C4.488 14.215 5.558 16.8 7.697 16.8H18a1.2 1.2 0 1 0 0-2.4H7.697l1.2-1.2H16.8a1.199 1.199 0 0 0 1.073-.664l3.6-7.2A1.2 1.2 0 0 0 20.4 3.6H7.536l-.372-1.492A1.2 1.2 0 0 0 6 1.2H3.6Zm15.6 18.6a1.8 1.8 0 1 1-3.6 0 1.8 1.8 0 0 1 3.6 0ZM7.8 21.6a1.8 1.8 0 1 0 0-3.6 1.8 1.8 0 0 0 0 3.6Z">
										</path>
									</svg>add to cart
								</button>
							</div>
						</div>
						<div class='flex-column group'>

							<input type="hidden" name="hidden_author"  value="<?php echo $row['author']; ?>">
							<input type="hidden" name="hidden_title"  value="<?php echo $row['title']; ?>">
							<input type="hidden" name="hidden_image"  value="<?php echo $row['image']; ?>">
							<input type="hidden" name="hidden_price"  value="<?php echo $row['price']; ?>">
							<input type="hidden" name="hidden_quantity"  value="1">
							<input type="hidden" name="hidden_category"  value="<?php echo $row['category']; ?>">
						</div>
					</div>
					<?php }}?>
			
	</form>
</div>
</div>


<?php require "./php/books/template/footer.php"; ?>


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


