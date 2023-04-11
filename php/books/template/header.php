<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
	</head>
<style><?php require_once __DIR__ . './style.css'; ?></style> 

<?php //header("Refresh:10");
require_once __DIR__ . '/../../db/conn_database.php';

$conn = db_config();

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





$query  = "SELECT category FROM book";
$result = mysqli_query($conn, $query);



?>













<body>
	<nav class="navbar">
		<i class="material-icons menu-icon">menu</i>
		<div class="logo">
			<div class="text"> Shop. </div>
		</div>
		<div class="item search right" tabindex="0">
			<form action="" method="get">
				<div class="search-group">
					<input style="color: black; width: 10em;" type="search" placeholder="Books, author, Desc" name="search_query">
					<button style="color: black;" type="submit" name="search_btn">Search</button>
				</div>
			</form>
		</div>
		<a href="php/books/orders/cart/cart.php" class="item">
			<div class="group">
				<div class="detail"> Cart </div>
				<div class="sub"><?php echo getCount($conn, 'cart')?></div>
			</div>
		</a>
			<a href="./auth/login_form.php"><div style="margin-left: 2em;" class="text"> login/sign up </div></a>
	</nav>
</body>
