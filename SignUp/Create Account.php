<?php
include 'Connect.php';

if($conn== false)
    die(print_r(sqlsrv_errors(),true));
else
    if(!empty($_POST['save'])){
    
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $query="insert into Customers (Fname,Lname,Email,phoneNo) values('$fname','$lname','$email','$phone')";
        $result=sqlsrv_query($conn,$query);

        if($result){
            echo'Welcome to Senq Marketplace';
        }

        else{
            echo'Please fill out all the fields correctly';
        }
}


?>