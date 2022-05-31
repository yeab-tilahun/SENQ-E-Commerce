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
</head>
<body>
  <?php
      require 'nav.php';
  ?>
<section class="shopping-cart">
  <h1>Shopping Cart</h1>
  <section class="column-labels">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-quantity">Remove</label>  
    <label class="product-quantity">Total</label>
    <!-- <label class="product-line-price">Total</label> -->
  </section>
  
  
  
  <form action="removeCartItemAndMakeTran.php" method="get">
  <?php
						//initialize total
            $total=0;
            if(empty($_SESSION['cart'])){
              echo "<script>document.body.firstElementChild.textContent=\"Shopping Cart is empty\"</script>";
            }
						if(!empty($_SESSION['cart'])){
						// //create array of initail qty which is 1
 						// if(!isset($_SESSION['qty_array'])){
 						// 	$_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
 						// }
             for ($i=0; $i<count($_SESSION['cart']); $i++) {           
             $tsql="SELECT * FROM Product WHERE ProID=".$_SESSION['cart'][$i];
             $getResults = sqlsrv_query($con, $tsql);
         
             if ($getResults === false) {
                echo "<h3>There is nothing to display</h3>";
                 die();
             }
             else {
                 while ($row = sqlsrv_fetch_array($getResults)) {
                     echo '   <section class="product">';
                     echo '   <section class="product-image">';
                     echo '<img src="../../Admin/Product/'. $row['img'].'">';
                     echo '     </section>';
                     echo '    <section class="product-details">';
                     echo ' <section class="product-title">'. $row['PName'] . '</section>';
                     echo '<p class="product-description">' . $row['ProDesc'] . '</p>';
                     echo '    </section>';
                     echo '  <section class="product-price">'. $row['UPrice'] . '</section>';
                     echo '<section class="product-quantity">';
                     echo '    <input type="number" id="qty" name=qty[] value="1" min="1">';
                     echo '    </section>';
                     echo '     <section class="product-removal">';
                     echo '<input class="remove-product" type="submit" name="id" value='. $row['ProID'] .'  />';
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
            <input type="submit" class="checkout" name="checkout"  value="Check out"/>
      </form>
</body>
</html>
<script src="jquery.min.js"></script>
<script src="index.js"></script>