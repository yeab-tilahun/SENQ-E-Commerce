<?php
require("../connect.php");
$con=getConnect(); 

if(isset($_POST['submit']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$query="select * from Customers where email='$username' and PassWrd='$password'";
$result=sqlsrv_query($con, $query);
// $count=mysqli_num_rows($result);

// if($conn== false)
//     die(print_r(sqlsrv_errors(),true));
// else
//     echo'Connection Success';
if ($result == false){
    echo'The error is around the database';
    }
    else{
        while ($row = sqlsrv_fetch_array($result)) {
         if($row['Email']==$username && $row['PassWrd']==$password)
        {
            
            session_start();
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;
            header("location:../index.php");
        }
    }
          
    echo 'You entered the wrong username or password';
        //    header("location: Sign-in.html");
    }
    
    
    }

?>
