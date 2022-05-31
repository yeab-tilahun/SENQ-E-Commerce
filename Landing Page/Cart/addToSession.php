<?php
	session_start();
	//check if product is already in the cart
	if(!in_array($_GET['id'], $_SESSION['cart'])){
		array_push($_SESSION['cart'], $_GET['id']);
		// $_SESSION['message'] = 'Product added to cart';
        echo '<script>alert("Product added to cart")</script>';
        $cat= $_GET['cat'];
		$search_input=$_GET['search_input'];
		header("location: ../Products/index.php?search_input=$search_input&cat=$cat");
	}
	else{
        echo "<script>alert('Product already in cart')</script>";
        $cat= $_GET['cat'];
		$search_input=$_GET['search_input'];
        header("location: ../Products/index.php?search_input=$search_input&cat=$cat");
	}

?>
 <?php
        // $count=count($_SESSION['cart']);
        // echo "<script>document.querySelector('.count_cart').innerHTML='($count)';</script>";
?>