<?php
session_start();
require "../../db/conn_database.php";
    //  header('Location: ../../../index.php');

$conn = db_connect();





if (isset($_POST['add_to_cart'])) {
  $title = $_POST['hidden_title'];
  $price = $_POST['hidden_price'];
  $qty = $_POST['quantity'];

  $sql_cart = mysqli_query($conn, "SELECT * FROM cart WHERE title = '$title'");

  if (mysqli_num_rows($sql_cart) > 0) {
    // add error message
  } else {
    $insert_book = mysqli_query($conn, "INSERT INTO `cart` (title, price, quantity) VALUES('$title', '$price', '$qty')");
    // add success message
  }
}

// retrieve cart items from the database
$sql_cart_items = mysqli_query($conn, "SELECT * FROM cart");

?>


    <title>Shopping Cart</title>


    <h1>Shopping Cart</h1>

    <?php if (mysqli_num_rows($sql_cart_items) > 0): ?>

<link rel="stylesheet" href="./add_to_cart.css">
  <main>

    <div class="basket">
      <div class="basket-module">
        <label for="promo-code">Enter a promotional code</label>
        <input id="promo-code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
        <button class="promo-code-cta">Apply</button>
      </div>
      <div class="basket-labels">
        <ul>
          <li class="item item-heading">Item</li>
          <li class="price">Price</li>
          <li class="quantity">Quantity</li>
          <li class="subtotal">Subtotal</li>
        </ul>
      </div>


          <?php while ($row = mysqli_fetch_assoc($sql_cart_items)): ?>
      <div class="basket-product">
        <div class="item">
          <div class="product-image">
            <img src="http://placehold.it/120x166" alt="Placholder Image 2" class="product-frame">
          </div>
          <div class="product-details">
            <h2>
            <strong><?php echo $row['title']; ?></strong></h2>
            <p><Span>Author </Span><?php echo $row['author']; ?></p>
            <p><Span>Decs </Span><?php echo $row['created_at']; ?></p>
          </div>
        </div>
        <div class="price"><?php echo $row['price']; ?></div>
        <div class="quantity">
          <h3><?php echo $row['quantity'];?></h3>
        </div>
        <div class="subtotal"><?php echo $row['price'] * $row['quantity'] ?></div>
        <div class="remove">

  <form action='add_to_cart.php' method="post">
    <button type="submit" name="delete">Remove</button>
    <?php
    if (isset($_POST['delete'])) {
      $item_id = $row['id']; // Replace with the ID of the item you want to delete
      $sql_delete = "DELETE FROM cart WHERE id = $item_id";
      if ($conn->query($sql_delete) === TRUE) {
       $message =  "Item deleted successfully";
      } else {
         $message = "Error deleting item: " . $conn->error;
      }
    }
    ?>
  </form>
</div>

  

      </div>

        
   
          <?php endwhile; ?>
    </div>
        </tbody>
      </table>
    <?php else: ?>
      <p>Your cart is empty</p>
    <?php 
      header('Location: ../../../index.php');
    endif; ?>



    <aside>
      <div class="summary">
        <div class="summary-total-items"><span class="total-items"></span> Items in your Bag</div>
        <div class="summary-subtotal">
          <div class="subtotal-title">Subtotal</div>
          <div class="subtotal-value final-value" id="basket-subtotal">130.00</div>
          <div class="summary-promo hide">
            <div class="promo-title">Promotion</div>
            <div class="promo-value final-value" id="basket-promo"></div>
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
          <div class="total-value final-value" id="basket-total">130.00</div>
        </div>
        <div class="summary-checkout">
          <button class="checkout-cta">Go to Secure Checkout</button>
        </div>
      </div>
    </aside>
  </main>
</body>
<script src="./add_to_cart.js"></script>
</html>





      

