<?php
require("../connect.php");
$con=getConnect();
$currentUser= 'sura@senq'; //get_current_user();
$query="select * from Customers where email='$currentUser'";
$result=sqlsrv_query($con, $query);

while(sqlsrv_fetch_array($result)){
    $name=$row['Fname'];
    $lname=$row['Lname'];
    $email=$row['Email'];
    $password=$row['PassWrd'];
    $phone=$row['phoneNo'];

    echo '<script>
    document.getElementByName("email").value = "'.$email.'";
    </script>';
    echo $name;
    echo $lname;
    echo $password;
    echo $phone;

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="MyProfile.css">
    <script src="MyProfile.js" defer></script>
</head>

<body>

    <section class="container">
        <form action="MyProfile.php" method="post">
<!--  enctype='multipart/form-data' -->
        <!-- <article class="advert"><img src="../Images/Welcome to Senq marketplace.png" alt="Advert" class="advert"></article> -->

            <!-- <div class="signup"> -->
            <!-- <h2 class="title">My Profile</h2> -->
            <div class="art">
                <img src="../Images/unsplash1.png" alt="" class="profile">
            </div>
            
            <!-- <div><p><br><br><br></p></div>  To create space between the h2 and the img -->
            
         <div class="pic">
             <img src="../Images/Profile.jpg" id="photo">
             <input type="file" name="pp" id="file" id="pp">
             <label for="file" id="uploadBtn"><img src="../Images/addImg.png"></label>
             

             <!-- <input type="file" name="imgFile" id="imgFile" accept="images/*" required />
            <label for="imgFile"></label> -->
         </div>
         <div class="pname">
            <h3 class="name">Yodahe Zerihun</h3>
         </div>
        


         <section class="display">

            <article class="email"> <!-- Email -->
                <input type="text" name="email" placeholder="Email" disabled>
                <article class="underline"></article>
            </article>

            <article class="email"> <!-- Password -->
                <input type="text" name="Password" placeholder="password" disabled required>
                <article class="underline"></article>
            </article>

            <article class="phone"> <!-- Phone -->
                <input type="text" name="phone" placeholder="Phone" disabled required>
                <article class="underline"></article>
            </article>

            <!-- <article class="email"> -- password --
                <input type="password" name="pass" placeholder="password" disabled required> --
                 <article class="underline"></article>
            </article> -->

            <!-- <article class="phone">  phonenumber 
                -- <input type="text" name="phone" placeholder="Phone Number" disabled required> 
               -- <article class="underline"></article> 
            </article> -->

           
        </section>

        <article class="create">
            <input type="submit" name="save" id="save" value="Save" onclick="disable()">

        </article>

        <article class="edit">
            <input type="Submit" name="edit" id="edit" value="Edit" onclick="enable()">
        </article>

            <!-- <article class="link">
                <p>Have an account? <a href="../SignIn/Sign-in.html">Sign-In</a></p><br>

            </article> -->

            <article class="trade">
                <p>Senq Marketplace &trade;</p>
            </article>
        <!-- </div> -->
    
        </form>
    </section>
  
</body>
</html>