<!-- php code to create account -->
<?php
require("../connect.php");
$con=getConnect(); 

    if(isset($_POST['save'])){  
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['pass'];
        
        $query="insert into Customers (Fname,Lname,PassWrd,Email,phoneNo)
        values('$fname','$lname','$password','$email','$phone')";
        
        $result=sqlsrv_query($con,$query);

        if(!$result){
            echo 'Email or Phone Number Used Already Exisits';
            die();
        }

        
        $result=sqlsrv_query($con,"Exec USP_GetLastCustomerID");
        $row = sqlsrv_fetch_array($result);
        $lastCustID=$row[0];

        $ProfileName=$lastCustID.".jpg";

        sqlsrv_query($con,"update Customers set img='".$ProfileName."' where CustID=".$lastCustID);


        //code below is uploading profile img from  Image Input Element to project folder
         $UserImg=$_FILES['pp']['name'];
         $UserImgTemp=$_FILES["pp"]["tmp_name"];
         move_uploaded_file($UserImgTemp,"../../Admin/Customer/".$ProfileName);
        //product photo has been uploaded now

        header('location: Sign.php');
        
}


