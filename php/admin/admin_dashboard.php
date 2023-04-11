<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	
<link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.5/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
</head> 
<body>
<?php //header("refresh:3") ?>

<div class="navbar bg-base-400">
  <div class="flex-1">
    <a class="btn btn-ghost normal-case text-xl">daisyUI</a>
  </div>
  <div class="flex-none">
    <ul class="menu menu-horizontal px-1">
      <li><a href="./admin_add.php">Add book</a></li>

      <!-- <li><a>Delete book</a></li> -->
    </ul>
  </div>
</div>
<main class="p-5 m-5 ">

<?php //header("Refresh:10");
require'../db/conn_database.php';

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

<!-- <a class="link link-accent">I'm a simple link</a> -->
<h2 class="font-extrabold text-center my-5  py-5 text-5xl underline">Statisctics</h2>
<div class="stats shadow justify-center w-full ">
  
  <div class="stat text-center">
    <div class="stat-title">Total books</div>
    <div class="stat-value "><?php echo getCount($conn, 'book')?></div>
  </div>
 
  
  <div class="stat border border-orange-500 text-center">
    <div class="stat-title">Total orders</div>
    <div class="stat-value "><?php echo getCount($conn, 'orders')?></div>
  </div>
 
  
</div>

<div class="">
<h2 class="font-extrabold text-center my-5  py-5 text-5xl underline">Pending Orders</h2>
<div class="overflow-x-auto">
  <table class="table w-full">
<?php
     $query = "SELECT * FROM orders";
$result = mysqli_query($conn, $query);
?>

<title>shop</title>
<link rel="stylesheet" href="./index.css">

<div class='container'>
    <form action="php/books/orders/cart/cart.php" method="POST">
        <div class='center list flex-column '>




                        
    <!-- head -->
    <thead>
      <tr>
       
        <th>Name</th>
        <th>email</th>
        <th>addres</th>
        <th>city</th>
        <th>region</th>
        <th>zip code</th>
        <th>payment</th>
        <th>orders</th>
        <th>total cost</th>
        <th>status</th>
      </tr>
    </thead>
    <tbody>
      <!-- row 1 -->
            <?php while ($row = mysqli_fetch_array($result)) { ?>
      <tr>

			<td><?php echo $row["buyer_name"]; ?></td>
			<td><?php echo $row["buyer_email"]; ?></td>
			<td><?php echo $row["buyer_address"]; ?></td>
			<td><?php echo $row["buyer_city"]; ?></td>
			<td><?php echo $row["buyer_region"]; ?></td>
			<td><?php echo $row["buyer_zip_code"]; ?></td>
			<td><?php echo $row["buyer_payment_method"]; ?></td>		
			<td class="break-all "><?php echo $row["orders"]; ?></td>
			<td><?php echo $row["order_total_cost"]; ?></td>
			<td><?php echo $row["status"]; ?></td>
				
      </tr>
		 <?php };?>
      <!-- row 2 -->
      
    </tbody>
  </table>
</div></div>
</main>

</body>
</html>




