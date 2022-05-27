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
    <?php
        require 'sp_editCustomer.php';
    ?>
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
             <img src=" <?php $profilePhotoDir ?>" alt="../Images/Profile.jpg" id="photo">
             <input type="file" name="pp" id="file" id="pp">
             <label for="file" id="uploadBtn"><img src="../Images/addImg.png"></label>
             

             <!-- <input type="file" name="imgFile" id="imgFile" accept="images/*" required />
            <label for="imgFile"></label> -->
         </div>
         <div class="pname">
            <h3 class="name">Yodahe Zerihun</h3>
         </div>  
         <section class="display">
            <article class="fname"> <!-- First Name -->
                First Name
                <input type="text" name="Fname" value="<?php echo "$Fname"; ?>">
                <article class="underline"></article>
            </article>
            <article class="lname"> <!-- Last Name -->
                 Last Name
                <input type="text" name="Lname" value="<?php echo "$Lname"; ?>">
                <article class="underline"></article>
            </article>

            <article class="email"> <!-- Email -->
                Email
                <input type="text" name="Email" value="<?php echo "$Email"; ?>">
                <article class="underline"></article>
            </article>

            <article class="email"> <!-- Password -->
                Pass Word
                <input type="text" name="passWrd" value="<?php echo "$PassWrd"; ?>">
                <article class="underline"></article>
            </article>

            <article class="phone"> <!-- Phone -->
                Phone
                <input type="text" name="phoneNo" value="<?php echo "$PhoneNo"; ?>">
                <article class="underline"></article>
            </article>

           
        </section>

        <article class="create">
            <input type="submit" name="updateButton" id="save" value="Save">

        </article>

        <article class="edit">
            <input type="button" name="edit" id="edit" value="Edit" onclick="enable()">
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