<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
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

?>



	<body>

		<nav class="navbar">
			<i class="material-icons menu-icon">
				menu
			</i>
			<div class="logo">
				<div class="text"> GrabCheap
				</div>
			</div>
			<div class="item search right" tabindex="0">
				<div class="search-group">
					<select>
						<option value="all">All</option>
						<option value="all">Mens</option>
						<option value="all">Womens</option>
						<option value="all">Winter</option>
						<option value="all">Summer</option>
					</select>
					<input type="text">
				
						<svg class='icon' width="50" height="20" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M9.6 4.8a4.8 4.8 0 1 0 0 9.6 4.8 4.8 0 0 0 0-9.6ZM2.4 9.6a7.2 7.2 0 1 1 13.068 4.171l5.78 5.78a1.2 1.2 0 0 1-1.696 1.697l-5.78-5.779A7.2 7.2 0 0 1 2.4 9.6Z" clip-rule="evenodd"></path>
</svg>
					
				</div>
			</div>


			<a href="" class="item">
				<div class="group">
					<svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"
						xmlns="http://www.w3.org/2000/svg">
						<path
							d="M3.6 1.2a1.2 1.2 0 0 0 0 2.4h1.464l.366 1.466.012.05 1.63 6.517L6 12.703C4.488 14.215 5.558 16.8 7.697 16.8H18a1.2 1.2 0 1 0 0-2.4H7.697l1.2-1.2H16.8a1.199 1.199 0 0 0 1.073-.664l3.6-7.2A1.2 1.2 0 0 0 20.4 3.6H7.536l-.372-1.492A1.2 1.2 0 0 0 6 1.2H3.6Zm15.6 18.6a1.8 1.8 0 1 1-3.6 0 1.8 1.8 0 0 1 3.6 0ZM7.8 21.6a1.8 1.8 0 1 0 0-3.6 1.8 1.8 0 0 0 0 3.6Z">
						</path>
					</svg>
					<div class="detail">
						Cart
					</div>
						<div class="sub"><?php echo getCount($conn, 'cart')?></div>
				</div>
			</a>
		</nav>
	</body>

</html>
