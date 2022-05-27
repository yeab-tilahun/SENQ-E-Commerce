<?php

    session_start();
    //remove the id from our cart array	
    unset($_SESSION['CustID']);
    header('location: SignIn/Sign-in.php');
?>
