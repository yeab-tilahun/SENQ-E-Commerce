<?php
	session_start();
  require_once '../connect.php';
  $con=getConnect();  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="../nav.css">
    <script src="../jquery.min.js"></script>
    <script src="../index.js"></script>
     <!--font awesome-->
     <script src="https://kit.fontawesome.com/32afe344eb.js" crossorigin="anonymous"></script>
</head>
<body>
<section class="navigation"  class="navbar fixed-top topnav">
    <div class="nav-container">
      <div class="brand">
        <a href="#!"><img src="../images/Vector Smart Object.png" class="logo" width="90%" alt=""></a>
      </div>

      <nav>
        <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
        <ul class="nav-list">
          
          <li>
            <a href="#!"><abbr title="Profile"><i class="fa-solid fa-circle-user fa-2x" id="icon1"></i></a>
            <ul class="nav-dropdown">
              <li>
                <a href="../MyProfile/MyProfile.php">My Profile</a>
              </li>
              <li>
                <a href="../History/history.php">History</a>
              </li>
              <li>
                <a href="../sp_deleteAccount.php">Delete Account</a>
              </li>
            </ul>
          </li>
          
          <li>
            <a href="../Cart/index.php" type="submit"><abbr title="My cart"><i class="fa-solid fa-cart-arrow-down fa-2x" style="margin-bottom: 4px;" id="icon2"></i><span class="count_cart"
                    style="font-size: 1em;"
            > <?php  
                                                    //  session_start();
                                                      if(!isset($_SESSION['cart']) || ($_SESSION['cart'])==null){
                                                        echo '( 0 )';
                                                      }else{
                                                        echo '( '.count($_SESSION["cart"]).' )';
                                                        } 
                                                     ?>
           </span></a>                  
          </li>
          <li>
            <a href="../SignIn/Sign-in.php"><abbr title="Log In"><i class="fa-solid fa-arrow-right-to-bracket fa-2x"></i></a>
          </li>
          <li>
            <a href="../logout.php"><abbr title="Log Out"><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></a>
          </li>
        </ul>
     
      </nav>
    </div>
  </section>
    <h1>Shopping Cart</h1>

<section class="shopping-cart">

  <section class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-removal">Remove</label>  
    <label class="product-line-price">Total</label>
  </section>
  <form action="sp_makeTran.php" method="post">

    <?php

						//initialize total
						$total = 0;
            if(empty($_SESSION['cart'])){
              echo "<script>document.body.firstElementChild.textContent=\"Shopping Cart is empty\"</script>";
            }
						if(!empty($_SESSION['cart'])){
						//create array of initail qty which is 1
 						if(!isset($_SESSION['qty_array'])){
 							$_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
 						}
             for ($i=0; $i<count($_SESSION['cart']); $i++) {           
             $tsql="SELECT * FROM Product WHERE ProID=".$_SESSION['cart'][$i];
             $getResults = sqlsrv_query($con, $tsql);
         
             if ($getResults === false) {
                echo "<h3>There is nothing to display</h3>";
                // echo $_SESSION['cart'][2];
                die();
             }
             else {
                 while ($row = sqlsrv_fetch_array($getResults)) {
                     echo '   <section class="product">';
                     echo '   <section class="product-image">';
                     echo '<img src="../img/'. $row['img'] ."\"". '.png" alt="' . $row['img'] . '">';
                     echo '     </section>';
                     echo '    <section class="product-details">';
                     echo ' <section class="product-title">'. $row['PName'] . '</section>';
                     echo '<p class="product-description">' . $row['ProDesc'] . '</p>';
                     echo '    </section>';
                     echo '  <section class="product-price">'. $row['UPrice'] . '</section>';
                     echo '<section class="product-quantity">';
                     echo '    <input name=qty[] type="number" value="1" min="1">';
                     echo '    </section>';
                     echo '     <section class="product-removal">';
                     echo '      <a href="deleteFromSession.php?id='. $row['ProID'] . '"> <button class="remove-product">Remove</button> </a>'; 
                     echo '</section>';
                     echo ' <section class="product-line-price">'. $row['UPrice'] . '</section>';
                     echo '</section>';

                     $taxRate = 0.05;
                     $shippingRate = 15.00;
                     $total += $row['UPrice'];
                     $tax = $total * $taxRate;
                     $grandTotal = $total + $tax + $shippingRate;
                 }
                 sqlsrv_free_stmt($getResults);
             }
             
            }
            echo '   <section class="totals">';
            echo '   <section class="totals-item">';
            echo ' <label>Subtotal</label>';
            echo '  <section class="totals-value" id="cart-subtotal">'.$total.'</section>';
            echo '    </section>';
            echo '<section class="totals-item">';
            echo '<label>Tax (5%)</label>';
            echo '  <section class="totals-value" id="cart-tax">'.$tax.'</section>';
            echo '</section>';
            echo '<section class="totals-item">';
            echo '<label>Shipping</label>';
            echo '  <section class="totals-value" id="cart-shipping">'.$shippingRate.'</section>';
            echo '</section>';
            echo '<section class="totals-item totals-item-total">';
            echo '<label>Grand Total</label>';
            echo '  <section class="totals-value" id="cart-total">'.$grandTotal.'</section>';
            echo '</section>';
            echo '</section>';
          
          }
         
					?>
            <section class="checkout">
              <!-- plss style meee -->
              <input type="submit" value="checkout">
            </section>
         </form>

  <!-- <section class="product">
    <section class="product-image">
      <img src="https://s.cdpn.io/3/dingo-dog-bones.jpg">
    </section>
    <section class="product-details">
      <section class="product-title">Dingo Dog Bones</section>
      <p class="product-description">The best dog bones of all time. Holy crap. Your dog will be begging for these things! I got curious once and ate one myself. I'm a fan.</p>
    </section>
    <section class="product-price">12.99</section>
    <section class="product-quantity">
      <input type="number" value="1" min="1">
    </section>
    <section class="product-removal">
      <button class="remove-product">
        Remove
      </button>
    </section>
    <section class="product-line-price">25.98</section>
  </section> -->


  <!-- <section class="totals">
    <section class="totals-item">
      <label>Subtotal</label>
      <section class="totals-value" id="cart-subtotal">71.97</section>
    </section>
    <section class="totals-item">
      <label>Tax (5%)</label>
      <section class="totals-value" id="cart-tax">3.60</section>
    </section>
    <section class="totals-item">
      <label>Shipping</label>
      <section class="totals-value" id="cart-shipping">15.00</section>
    </section>
    <section class="totals-item totals-item-total">
      <label>Grand Total</label>
      <section class="totals-value" id="cart-total">90.57</section>
    </section>
  </section>
      
      <button class="checkout">Checkout</button>

</section> -->
</body>
</html>
<script src="jquery.js"></script>
<script src="index.js"></script>