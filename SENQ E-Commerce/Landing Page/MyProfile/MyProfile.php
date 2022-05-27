<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="MyProfile.css">
    <script src="MyProfile.js" defer></script>
    <link rel="stylesheet" href="../nav.css">
    <script src="../jquery.min.js"></script>
    <script src="../index.js"></script>
     <!--font awesome-->
     <script src="https://kit.fontawesome.com/32afe344eb.js" crossorigin="anonymous"></script>
</head>
<!-- profile -->
<?php
        require 'sp_editCustomer.php';
    ?>
<body>
<section class="navigation"  class="navbar fixed-top topnav">
    <div class="nav-container">
      <div class="brand">
        <a href="#!"><img src="../images/Vector Smart Object.png" class="logo" width="90%" alt=""></a>
      </div>

      <nav>
        <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
        <ul class="nav-list">
          
          <li>
            <a href="#!"><abbr title="Profile"><i class="fa-solid fa-circle-user fa-2x" id="icon1"></i></a>
            <ul class="nav-dropdown">
              <li>
                <a href="../MyProfile/MyProfile.php">My Profile</a>
              </li>
              <li>
                <a href="../History/history.php">History</a>
              </li>
              <li>
                <a href="../sp_deleteAccount.php">Delete Account</a>
              </li>
            </ul>
          </li>
          
          <li>
            <a href="../Cart/index.php" type="submit"><abbr title="My cart"><i class="fa-solid fa-cart-arrow-down fa-2x" style="margin-bottom: 4px;" id="icon2"></i><span class="count_cart"
                    style="font-size: 1em;"
            > <?php  
                                                    //  session_start();
                                                      if(!isset($_SESSION['cart']) || ($_SESSION['cart'])==null){
                                                        echo '( 0 )';
                                                      }else{
                                                        echo '( '.count($_SESSION["cart"]).' )';
                                                        } 
                                                     ?>
           </span></a>                  
          </li>
          <li>
            <a href="../SignIn/Sign-in.php"><abbr title="Log In"><i class="fa-solid fa-arrow-right-to-bracket fa-2x"></i></a>
          </li>
          <li>
            <a href="../logout.php"><abbr title="Log Out"><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></a>
          </li>
        </ul>
     
      </nav>
    </div>
  </section>





    <section class="container">
        <form action="MyProfile.php" method="post">
<!--  enctype='multipart/form-data' -->
        <!-- <article class="advert"><img src="../Images/Welcome to Senq marketplace.png" alt="Advert" class="advert"></article> -->

            <!-- <div class="signup"> -->
            <!-- <h2 class="title">My Profile</h2> -->
            <div class="art">
                <!-- <img src="../Images/unsplash1.png" alt="" class="profile"> -->
            </div>
            
            <!-- <div><p><br><br><br></p></div>  To create space between the h2 and the img -->
            
         <div class="pic">
             <img src="<?php echo $profilePicDir?>" alt="../Images/Profile.jpg" id="photo">
             <input type="file" name="pp" id="file" value="<?php echo "$Img";?>" id="pp">
             <!-- <label for="file" id="uploadBtn"><img src="../Images/addImg.png"></label> -->
             

             <!-- <input type="file" name="imgFile" id="imgFile" accept="images/*" required />
            <label for="imgFile"></label> -->
         </div>
         <div class="pname">
         <input type="text" class="bold" name="Fname" value="<?php echo "$Fname $Lname ";  ?>" disabled>

         </div>  
         <section class="display">
            <article class="fname"> <!-- First Name -->
               <p>First Name</p> 
                <input type="text" name="Fname" value="<?php echo "$Fname"; ?>">
                <article class="underline"></article>
            </article>
            <article class="lname"> <!-- Last Name -->
                 <p>Last Name</p>
                <input type="text" name="Lname" value="<?php echo "$Lname"; ?>">
                <article class="underline"></article>
            </article>

            <article class="email"> <!-- Email -->
               <p>Email</p> 
                <input type="text" name="Email" value="<?php echo "$Email"; ?>">
                <article class="underline"></article>
            </article>

            <article class="email"> <!-- Password -->
                <p>Password</p>
                <input type="text" name="passWrd" value="<?php echo "$PassWrd"; ?>">
                <article class="underline"></article>
            </article>

            <article class="phone"> <!-- Phone -->
                <p>Phone</p>
                <input type="text" name="phoneNo"  value="<?php echo "$PhoneNo"; ?>">
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