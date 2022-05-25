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
        <form action="Create Account2.php" method="post" enctype='multipart/form-data'>

        <article class="advert"><img src="../Images/Welcome to Senq marketplace.png" alt="Advert" class="advert"></article>

            <div class="signup">
            <h2 class="title">Create Account</h2>
            
            <div><p><br><br><br></p></div>  <!-- To create space between the h2 and the img-->
            
         <div class="pic">
             <img src="../Images/Profile.jpg" id="photo">
             <input type="file" name="pp" id="file" id="pp">
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
                <p>Have an account? <a href="../SignIn/Sign-in.html">Sign-In</a></p><br>

            </article>

            <article class="trade">
                <p>Senq Marketplace &trade;</p>
            </article>
        </div>
    
        </form>
    </section>
  
</body>
</html>
