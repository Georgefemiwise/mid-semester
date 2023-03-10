



<?php  
$book = $_GET['detail'];

require_once "./template/header.php";
require "../db/get_functions.php";
$conn=db_connect();




  $query = "SELECT * FROM book WHERE id = '$book'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "Empty book";
    exit;
  }
 ?>

   




 <form method="post" action="./orders/add_to_cart.php">
<div class = "card-wrapper">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-fZtHHnpdRlRbawIzBk1K41JqaDMopQ2m3+1zVfW9XZtE/5MJFDL/EBFPw65wLbScy5eqN1aSD5K8r+PpXvPlw==" crossorigin="anonymous" /> -->
  <div class = "card">
    <!-- card left -->
    <div class = "product-imgs">
      <div class = "img-display">
        <div class = "img-showcase">
          <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_1.jpg" alt = "shoe image">
          <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_2.jpg" alt = "shoe image">
          <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_3.jpg" alt = "shoe image">
          <img src = "https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/shoe_4.jpg" alt = "shoe image">
        </div>
      </div>
    
    </div>
    <!-- card right -->
    <div class = "product-content">
      <h2 class = "product-title"><?php echo $row['title']; ?></h2>
      <!-- <a href = "#" class = "product-link">visit nike store</a> -->
      <div class = "product-rating">
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star"></i>
        <i class = "fas fa-star-half-alt"></i>
        <span>4.7(21)</span>
      </div>

      <div class = "product-price">
        <!-- <p class = "last-price">Old Price: <span>$257.00</span></p> -->
        <p class = "new-price">Price: <span>$<?php echo $row['price']; ?></span></p>
      </div>

      <div class = "product-detail">
        <h2>about this Book: </h2>
        <p><?php echo $row['description']; ?></p>
        <ul>
          
          <li>Available: <span>in stock</span></li>
          <li>Category: <span><?php echo $row['category']; ?></span></li>
          <!-- <li>Shipping Area: <span>All over the world</span></li>
          <li>Shipping Fee: <span>Free</span></li> -->
        </ul>
      </div>
      
     <input type="hidden" name="hidden_title"  value="<?php echo $row['title']; ?>">
      <input type="hidden" name="hidden_price"  value="<?php echo $row['price']; ?>">

      <div class = "purchase-info">
        <input type = "number" min = "1" value = "1" name="quantity">
        <button type = "submit" class = "btn" name="add_to_cart">
          Add to Cart <i class = "fas fa-shopping-cart"></i>
        </button>
        
      </div>

      <div class = "social-links">
        <p>Share At: </p>
        <a href = "#">
          <i class = "fab fa-facebook-f"></i>
        </a>
        <a href = "#">
          <i class = "fab fa-twitter"></i>
        </a>
        <a href = "#">
          <i class = "fab fa-instagram"></i>
        </a>
        <a href = "#">
          <i class = "fab fa-whatsapp"></i>
        </a>
        <a href = "#">
          <i class = "fab fa-pinterest"></i>
        </a>
      </div>
    </div>
  </div>
</div>
    </form>


<style>
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap');

*{
    box-sizing: border-box;
    padding: 0;
    margin: 0;
    font-family: 'Open Sans', sans-serif;
}
body{
    line-height: 1.5;
}
.card-wrapper{
    max-width: 1100px;
    margin: 0 auto;
}
img{
    width: 100%;
    display: block;
}
.img-display{
    overflow: hidden;
}
.img-showcase{
    display: flex;
    width: 100%;
    transition: all 0.5s ease;
}
.img-showcase img{
    min-width: 100%;
}
.img-select{
    display: flex;
}
.img-item{
    margin: 0.3rem;
}
.img-item:nth-child(1),
.img-item:nth-child(2),
.img-item:nth-child(3){
    margin-right: 0;
}
.img-item:hover{
    opacity: 0.8;
}
.product-content{
    padding: 2rem 1rem;
}
.product-title{
    font-size: 3rem;
    text-transform: capitalize;
    font-weight: 700;
    position: relative;
    color: #12263a;
    margin: 1rem 0;
}
.product-title::after{
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 4px;
    width: 80px;
    background: #12263a;
}
.product-link{
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 400;
    font-size: 0.9rem;
    display: inline-block;
    margin-bottom: 0.5rem;
    background: #256eff;
    color: #fff;
    padding: 0 0.3rem;
    transition: all 0.5s ease;
}
.product-link:hover{
    opacity: 0.9;
}
.product-rating{
    color: #ffc107;
}
.product-rating span{
    font-weight: 600;
    color: #252525;
}
.product-price{
    margin: 1rem 0;
    font-size: 1rem;
    font-weight: 700;
}
.product-price span{
    font-weight: 400;
}
.last-price span{
    color: #f64749;
    text-decoration: line-through;
}
.new-price span{
    color: #256eff;
}
.product-detail h2{
    text-transform: capitalize;
    color: #12263a;
    padding-bottom: 0.6rem;
}
.product-detail p{
    font-size: 0.9rem;
    padding: 0.3rem;
    opacity: 0.8;
}
.product-detail ul{
    margin: 1rem 0;
    font-size: 0.9rem;
}
.product-detail ul li{
    margin: 0;
    list-style: none;
    background: url(https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/checked.png) left center no-repeat;
    background-size: 18px;
    padding-left: 1.7rem;
    margin: 0.4rem 0;
    font-weight: 600;
    opacity: 0.9;
}
.product-detail ul li span{
    font-weight: 400;
}
.purchase-info{
    margin: 1.5rem 0;
}
.purchase-info input,
.purchase-info .btn{
    border: 1.5px solid #ddd;
    border-radius: 5px;
    text-align: center;
    padding: 0.45rem 0.8rem;
    outline: 0;
    margin-right: 0.2rem;
    margin-bottom: 1rem;
}
.purchase-info input{
    width: 60px;
}
.purchase-info .btn{
    cursor: pointer;
    color: #fff;
}
.purchase-info .btn:first-of-type{
    background: #256eff;
}
.purchase-info .btn:last-of-type{
    background: #f64749;
}
.purchase-info .btn:hover{
    opacity: 0.9;
}
.social-links{
    display: flex;
    align-items: center;
}
.social-links a{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    color: #000;
    border: 1px solid #000;
    margin: 0 0.2rem;
    border-radius: 50%;
    text-decoration: none;
    font-size: 0.8rem;
    transition: all 0.5s ease;
}
.social-links a:hover{
    background: #000;
    border-color: transparent;
    color: #fff;
}

@media screen and (min-width: 992px){
    .card{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 1.5rem;
    }
    .card-wrapper{
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .product-imgs{
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .product-content{
        padding-top: 0;
    }
}</style>

























<!-- 
 <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />

	 
<section class="text-gray-700 body-font overflow-hidden bg-white">
	<div class="container px-5 py-24 mx-auto">
		<div class="lg:w-4/5 mx-auto flex flex-wrap">
			<img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200"
				src="https://www.whitmorerarebooks.com/pictures/medium/2465.jpg">
			<div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
				<h1 class="text-gray-900 text-3xl title-font font-medium mb-1 capitalize"><?php echo $row['title']; ?></h1>
				
				<p class="leading-relaxed capitalize"><?php echo $row['description']; ?>.</p>
				<div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5"></div>
				<div class="flex">
					<span class="title-font font-medium text-2xl text-gray-900"></span>
					<button class='border mx-5 px-5 py-1 rounded text-white text-center bg-emerald-700' id="add-to-cart-btn" data-book="<?php echo $row['id']; ?>">Add to cart</button>
				</div>
			</div>
		</div>
	</div>
</section> -->



