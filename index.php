<?php

require "./php/books/template/header.php";
// require "./php/db/conn_database.php";
$conn = db_config();

$query  = "SELECT * FROM book ORDER BY abs(unix_timestamp(created_at)) DESC";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
  ?>




<title>shop</title>
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
							<div class='hidden bottom'><?php echo substr($row['description'], 0, 300) . '...'; ?></div>
							<div class='hidden bottom'>

								<a  href="php/books/detail/detail.php?detail=<?php echo $row['id']; ?>" " class='simple'>view</a>

							</div>
						</div>

					</div>
					<?php }} ?>

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


