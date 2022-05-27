<?php
 require("../connect.php");
 $con=getConnect();  

 session_start();
 //initialize cust_id if not set or is unset
 if(!isset($_SESSION['CustID']) ){
   $_SESSION['CustID']=0;
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
           }
       }else{
            //login has failed
             echo 'Login failed';
       }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-In</title>
    <link rel="stylesheet" href="../SignIn/Sign-in Style.css">
</head>
<body>
 
    

      <section class="container">
        
          <form action="Sign-in.php" method="post">

            <article class="advert"><img src="../Images/Senq.png" alt="Advert" class="advert"></article>

            <div class="signform">

              <h2 class="title">Sign-In</h2>
              
              <article class="username-box">
                  <!-- <label for="Username">Username</label> -->
                  <input type="text" id="Username" name="username" placeholder="Username" required>
                  <article class="underline"></article>
              </article>

              <article class="password-box">
                <!-- <label for="Password">Password</label> -->
                <input type="password" id="password" name="password" placeholder="Password" required>
                <article class="underline"></article>
              </article>

              <article class="button">
                  <input type="submit" name="submit" value="Sign In">
              </article>

              <article class="keep">
                <input type="checkbox" name="keeplog">
                <label for="name">Remember Me</label>
                <a href="#" class="forgot">Forgot Password?</a>

              </article>

              <article class="link">
            <p>Don't have an account? <a href="../SignUp/Create Account.php">Create one</a></p><br>
              </article>
              <article class="trade">
                <p>Senq Marketplace &trade;</p>
            </article>
          </div>
          </form>

      </section>
   

</body>
</html>
