<?php
    require 'connect.php';
    $con=getConnect();
    session_start();
    $CustID=$_SESSION["CustID"];

    $sql="USP_RemoveCustomer @CustID='".$CustID."'";
    // echo "<script> confirm('Are you Sure')</script>";

    sqlsrv_query($con,$sql);
    unset($_SESSION["CustID"]); 

    // echo "<script> alert('Deleted') </script>";
    header("location: Signup/Create%20Account.php");
?>