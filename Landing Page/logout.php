<?php
    session_start();

    //removing Customer id stored in session
    unset($_SESSION['CustID']);


    //remove the id from our cart array	
    unset($_SESSION['cart']);
    
    header('location: SignIn & SignUp/Sign.php');
?>
    