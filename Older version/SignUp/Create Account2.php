<?php
require("../connect.php");
$con=getConnect(); 

    if(isset($_POST['save'])){
    
        

        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];

        $ProfileName=$fname.$lname.".jpg";
        $profilePic=$ProfileName;
        $password=$_POST['pass'];

                 //code below is uploading profile img from  Image Input Element to project folder
                 $UserImg=$_FILES['pp']['name'];
                 $UserImgTemp=$_FILES["pp"]["tmp_name"];
                 move_uploaded_file($UserImgTemp,$ProfileName.".jpg");
                 //product photo has been uploaded now

        
        $query="insert into Customers (Fname,Lname,PassWrd,Email,phoneNo,img)
         values('$fname','$lname','$password','$email','$phone','$profilePic')";
        $result=sqlsrv_query($con,$query);

        if($result){
            echo'<h3>Welcome to Senq Marketplace</h3>';
        }

        else{
            echo'<h3>Please fill out all the fields correctly</h3>';
            die(print_r(sqlsrv_errors(), true));
        }
}


?>
