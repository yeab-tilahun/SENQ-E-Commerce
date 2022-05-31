<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="new.js" defer></script>
</head>
<body>
    <div class="container">
        <div class="blueBg">
            <div class="box signin">
                <h2>Already Have an Account ?</h2>
                <button class="signinBtn">Sign in</button>
            </div>
            <div class="box signup">
                <h2>Don't Have an Account ?</h2>
                <button class="signupBtn">Sign up</button>
            </div>
        </div>
        <div class="formBx">
            <div class="form signinForm">
                <form action="Sign-in.php" method="post">
                    <h3>Sign In</h3>
                    <input type="text" name="username" autocomplete="off" placeholder="Email">
                    <article class="underline"></article>
                    <input type="password" name="password" autocomplete="off" placeholder="Password">
                    <article class="underline"></article>
                    <input type="submit" name="submit" value="Login">
                    <a href="#" class="forgot">Forgot Password</a>
                    <p>Senq Marketplace &trade;</p>
                </form>
            </div>

            <div class="form signupForm">
                <form action="Create Account.php" method="post" enctype='multipart/form-data'>

                <div class="pic">
                        <img src="../Images/Profile.jpg" id="photo">
                        <input type="file" name="pp" id="file" accept=".jpg" required>
                        <label for="file" id="uploadBtn"><img src="../Images/addImg.png"></label>
                 </div>
                    
                    <h3 class="up">Sign Up</h3>

                    <input type="text" name="fname" autocomplete="off" placeholder="First Name" required>
                    <article class="underline"></article>
                    <input type="text" name="lname" autocomplete="off" placeholder="Last Name" required>
                    <article class="underline"></article>
                    <input type="text" name="email" autocomplete="off" placeholder="Email" required>
                    <article class="underline"></article>
                    <input type="password" name="pass" autocomplete="off" placeholder="password" required>
                    <article class="underline"></article>
                    <input type="text" name="phone" autocomplete="off" placeholder="Phone Number" required>
                    <article class="underline"></article>
                    <input type="submit" name="save" class="regi" value="Register">
                </form>
            </div>
        </div>
        <p class="trade">Senq Marketplace &trade;</p>
    </div>
    <script>
        const signinBtn = document.querySelector('.signinBtn');
        const signupBtn = document.querySelector('.signupBtn');
        const formBx = document.querySelector('.formBx');
        const body = document.querySelector('body');
        const register = document.querySelector('.regi');

        signupBtn.onclick = function(){
            formBx.classList.add('active');
            body.classList.add('active');
        }

        signinBtn.onclick = function(){
            formBx.classList.remove('active');
            body.classList.remove('active');
        }

        register.onclick = function(){
            formBx.classList.remove('active');
            body.classList.remove('active');
        }
    </script>
</body>
</html>