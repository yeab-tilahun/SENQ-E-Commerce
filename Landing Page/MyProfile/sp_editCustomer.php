<?php 
    require("../connect.php");
    $con=getConnect();    
    $CustID=0;  //get from session

    session_start();
    $CustID=$_SESSION['CustID'];

    
    if(isset($_POST["updateButton"])){
        //Preparing Query
        $sqlUpdate="Exec USP_UpdateCustomerInfo
        @CustID='".$CustID."',
        @Fname='".$_POST["Fname"]."',
        @Lname='".$_POST["Lname"]."',
        @passWrd='".$_POST["passWrd"]."',
        @Email='".$_POST["Email"]."',
        @phoneNo='".$_POST["phoneNo"]."'
        ";
        if(sqlsrv_query($con,$sqlUpdate)){
              echo "<script>
                       alert ('Action Successfull');
               </script>";
        }else{
              echo "<script>
                       alert ('Action Failed');
               </script>";
               die(print_r(sqlsrv_errors()));
        } 
    } 

    $sqlCustomerInfo="Exec ViewSpecificCustomerInfo
         @CustID='".$CustID."'";
        
    //Execting Query to get table data
    $result=sqlsrv_query($con,$sqlCustomerInfo);
     
     $Fname; $Lname; $PassWrd; $Email;$PhoneNo;$Img;
     if($row=sqlsrv_fetch_array($result)) {
           $Fname=$row['Fname'];
           $Lname=$row['Lname'];
           $PassWrd=$row['PassWrd'];
           $Email=$row['Email'];
           $PhoneNo=$row['phoneNo'];
           $Img=$row['img'];  
     }  
     //Now Custom/er Info are Stored in those Variables
     



?>
