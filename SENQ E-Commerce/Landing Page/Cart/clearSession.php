<?php
	session_start();
	unset($_SESSION['cart']);
    echo '<script>alert("Cart cleared")</script>';
	// header('location: index.php');
?>