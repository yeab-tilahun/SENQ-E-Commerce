

<!-- php code to create account -->
<?php
require("../connect.php");
$con=getConnect(); 

    if(isset($_POST['save'])){
    
        

        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];

        $ProfileName=$phone.".jpg";
        $password=$_POST['pass'];

                 //code below is uploading profile img from  Image Input Element to project folder
                 $UserImg=$_FILES['pp']['name'];
                 $UserImgTemp=$_FILES["pp"]["tmp_name"];
                 move_uploaded_file($UserImgTemp,"../../Admin/Customer/".$ProfileName);
                 //product photo has been uploaded now

        
        $query="insert into Customers (Fname,Lname,PassWrd,Email,phoneNo,img)
         values('$fname','$lname','$password','$email','$phone','$ProfileName')";
        $result=sqlsrv_query($con,$query);

        if($result){
            //redirecting to login page
            header('location: ../SignIn/Sign-in.php');
        }
        else{
            echo'<h3>Please fill out all the fields correctly</h3>';
            die(print_r(sqlsrv_errors(), true));
        }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="../SignUp/Create Account.css">
    <script src="Create Account.js" defer></script>
</head>

<body>

    <section class="container">
        <form action="" method="post" enctype='multipart/form-data'>

        <article class="advert"><img src="../Images/Welcome to Senq marketplace.png" alt="Advert" class="advert"></article>

            <div class="signup">
            <h2 class="title">Create Account</h2>
            
            <div><p><br><br><br></p></div>  <!-- To create space between the h2 and the img-->
            
         <div class="pic">
             <img src="../Images/Profile.jpg" id="photo">
             <input type="file" name="pp" id="file" accept=".jpg" id="pp">
             <label for="file" id="uploadBtn"><img src="../Images/addImg.png"></label>

             <!-- <input type="file" name="imgFile" id="imgFile" accept="images/*" required />
            <label for="imgFile"></label> -->
         </div>

            <article class="fname"> <!-- FirstName -->
                <input type="text" name="fname" placeholder="First Name" required>
                <article class="underline"></article>
            </article>

            <article class="lname"> <!-- LastName -->
                <input type="text" name="lname" placeholder="Last Name" required>
                <article class="underline"></article>
            </article>

            <article class="email"> <!-- Email -->
                <input type="text" name="email" placeholder="Email" required>
                <article class="underline"></article>
            </article>

            <article class="email"> <!-- password -->
                <input type="password" name="pass" placeholder="password" required>
                <article class="underline"></article>
            </article>

            <article class="phone"> <!-- phonenumber -->
                <input type="text" name="phone" placeholder="Phone Number" required>
                <article class="underline"></article>
            </article>

            <article class="create">
                <input type="submit" name="save" value="Create Account">

            </article>

            <article class="link">
                <p>Have an account? <a href="../SignIn/Sign-in.php">Sign-In</a></p><br>

            </article>

            <article class="trade">
                <p>Senq Marketplace &trade;</p>
            </article>
        </div>
    
        </form>
    </section>
  
</body>
</html>
