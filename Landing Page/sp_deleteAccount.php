<?php
    require 'connect.php';
    $con=getConnect();
    session_start();
    $CustID=$_SESSION["CustID"];

    $sql="USP_RemoveCustomer @CustID='".$CustID."'";

    sqlsrv_query($con,$sql);
    unset($_SESSION["CustID"]);
    unset($_SESSION["cart"]);
    
    //deleteing the Customer Profile Img
    unlink("../Admin/Customer/".$CustID.".jpg");

    header("location: SignIn & SignUp/Sign.php");
?>