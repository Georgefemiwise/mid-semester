<?php

require "./php/books/template/header.php";
require "./php/db/conn_database.php";
$conn = db_connect();


?>



<script src="https://cdn.tailwindcss.com"></script>
<section id="popular-books" class="bookshelf">
	<div class="container">
		<div class="flex justify-center items-center flex-col">

			<div class="section-header text-center">
				<div class="title">
					<span>Some quality items</span>
				</div>
				<h2 class="section-title text-4xl font-bold mt-4 mb-8">Popular Books</h2>
			</div>

			<ul class="flex justify-center items-center flex-wrap mb-8">
				<li data-tab-target="#all-genre"
					class="active tab mr-4 mb-4 px-4 py-2 rounded-full border-2 border-gray-300 cursor-pointer">All
					Genre</li>
				<li data-tab-target="#business"
					class="tab mr-4 mb-4 px-4 py-2 rounded-full border-2 border-gray-300 cursor-pointer">Business
				</li>
				<li data-tab-target="#technology"
					class="tab mr-4 mb-4 px-4 py-2 rounded-full border-2 border-gray-300 cursor-pointer">Technology
				</li>
				<li data-tab-target="#romantic"
					class="tab mr-4 mb-4 px-4 py-2 rounded-full border-2 border-gray-300 cursor-pointer">Romantic
				</li>
				<li data-tab-target="#adventure"
					class="tab mr-4 mb-4 px-4 py-2 rounded-full border-2 border-gray-300 cursor-pointer">Adventure
				</li>
				<li data-tab-target="#fictional"
					class="tab mr-4 mb-4 px-4 py-2 rounded-full border-2 border-gray-300 cursor-pointer">Fictional
				</li>
			</ul>



			





<div class="book-container">
<?php

$query = "SELECT * FROM book ORDER BY abs(unix_timestamp(created_at)) DESC";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) { ?>
    
	<div class="product-card">
	<a href="./php/books/detail.php">
		<div class="badge">Hot</div>
		<div class="product-tumb">
			<img src="https://i.imgur.com/xdbHo4E.png" alt="">
		</div>
		<div class="product-details">
			<span class="product-catagory"><?php echo $row['category']; ?></span>
			<h4><a href="./php/books/detail.php?detail=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></h4>
			<p><?php echo $row['description']; ?></p>
			<div class="product-bottom-details">
				<div class="product-price"><small>$96.00</small>$<?php echo $row['price']; ?></div>
				<div class="product-links">
					<a href=""><i class="fa fa-heart"></i></a>
					<a href=""><i class="fa fa-shopping-cart"></i></a>
				</div>
			</div>
		</div>
	</a>
	</div>


    <?php
    }
}
?>
</div>




















<style>@import url('https://fonts.googleapis.com/css?family=Roboto:400,500,700');
*
{
    -webkit-box-sizing: border-box;
            box-sizing: border-box;
    margin: 0;
    padding: 0;
}


.book-container {
    font-family: 'Roboto', sans-serif;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1em;
    padding: 2em;
}

@media (max-width: 1200px) {
    .book-container {
        grid-template-columns: repeat(3, 1fr);
        gap: 0.75em;
    }
}

@media (max-width: 900px) {
    .book-container {
        grid-template-columns: repeat(2, 1fr);
        gap: 0.5em;
    }
}

@media (max-width: 600px) {
    .book-container {
        grid-template-columns: 1fr;
        gap: 0.25em;
    }
}

.product-card a{
	z-index: 5;
}

a
{
    text-decoration: none;
}
.product-card {
    /* width: 380px; */
    position: relative;
    box-shadow: 0 2px 7px #dfdfdf;
    margin: 50px auto;
    background: #fafafa;
}

.badge {
    position: absolute;
    left: 0;
    top: 20px;
    text-transform: uppercase;
    font-size: 13px;
    font-weight: 700;
    background: red;
    color: #fff;
    padding: 3px 10px;
}

.product-tumb {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 300px;
    padding: 50px;
    background: #f0f0f0;
}

.product-tumb img {
    max-width: 100%;
    max-height: 100%;
}

.product-details {
    padding: 30px;
}

.product-catagory {
    display: block;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    color: #ccc;
    margin-bottom: 18px;
}

.product-details h4 a {
    font-weight: 500;
    display: block;
    margin-bottom: 18px;
    text-transform: uppercase;
    color: #363636;
    text-decoration: none;
    transition: 0.3s;
}

.product-details h4 a:hover {
    color: #fbb72c;
}

.product-details p {
    font-size: 15px;
    line-height: 22px;
    margin-bottom: 18px;
    color: #999;
}

.product-bottom-details {
    overflow: hidden;
    border-top: 1px solid #eee;
    padding-top: 20px;
}

.product-bottom-details div {
    float: left;
    width: 50%;
}

.product-price {
    font-size: 18px;
    color: #fbb72c;
    font-weight: 600;
}

.product-price small {
    font-size: 80%;
    font-weight: 400;
    text-decoration: line-through;
    display: inline-block;
    margin-right: 5px;
}

.product-links {
    text-align: right;
}

.product-links a {
    display: inline-block;
    margin-left: 5px;
    color: #e1e1e1;
    transition: 0.3s;
    font-size: 17px;
}

.product-links a:hover {
    color: #fbb72c;
}</style>






<?php require "./php/books/template/footer.php"; ?>
