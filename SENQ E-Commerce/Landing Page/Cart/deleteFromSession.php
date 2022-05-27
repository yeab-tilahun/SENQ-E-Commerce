<?php
	session_start();

	//remove the id from our cart array
	$key = array_search($_GET['id'], $_SESSION['cart']);	
	unset($_SESSION['cart'][$key]);

	//rearrange array after unset
	$_SESSION['cart'] = array_values($_SESSION['cart']);

    echo "<script>alert('Product deleted from cart')</script>";
	if(empty($_SESSION['cart'])){
		echo "<script>document.body.firstElementChild.textContent=\"Shopping Cart is empty\"</script>";
	}
	$count=count($_SESSION['cart']);
	echo "<script>document.querySelector('.count_cart').innerHTML='($count)';</script>";
	header('location: index.php');
?>
