<?php
 require("../connect.php");
 $con=getConnect();  

 session_start();
 //initialize cust_id if not set or is unset
 if(!isset($_SESSION['CustID']) ){
   $_SESSION['CustID'];
 }
 
 if(isset($_POST["submit"])){
      $sqlLogin="Exec USP_CustLogin
       @emailOrPhone='".$_POST["username"]."',
       @passWrd='".$_POST["password"]."'";
       $result=sqlsrv_query($con,$sqlLogin);
       if($result){
           if($row=sqlsrv_fetch_array($result)){
                 $_SESSION['CustID']=$row['CustID'];
                 header("location:../index.php");
           }else{
                 //login has failed
                 header("location: Sign.php");
           }
       }
    }
?>

