<?php
session_start();
include 'Connect.php';

$username=$_POST['username'];
$password=$_POST['password'];
$query="select * from Customers where email='$username' and PassWrd='$password'";
$result=mysqli_query($conn,$query);
$count=mysqli_num_rows($result);

// if($conn== false)
//     die(print_r(sqlsrv_errors(),true));
// else
//     echo'Connection Success';
    if($count>0){
        echo'Welcome!';
        header("Location: HomePage.html");
    }
    else{
        echo'You enter a wrong username or password';
    }


?>