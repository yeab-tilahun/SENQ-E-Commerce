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
    require 'nav.php';
    ?>
    <section class="container">
        <form action="MyProfile.php" method="post">

            <div class="art">
            </div>

            <div class="pic">
                <img src="../../Admin/Customer/<?php echo $Img ?>" id="photo">
            </div>
            <div class="pname">
                <span class="bold"><?php echo "$Fname $Lname ";  ?></span>
            </div>
            <section class="display">
                <article class="fname">
                    <!-- First Name -->
                    <p>First Name</p>
                    <input type="text" name="Fname" value="<?php echo "$Fname"; ?>" disabled>
                    <article class="underline"></article>
                </article>
                <article class="lname">
                    <!-- Last Name -->
                    <p>Last Name</p>
                    <input type="text" name="Lname" value="<?php echo "$Lname"; ?>" disabled>
                    <article class="underline"></article>
                </article>

                <article class="email">
                    <!-- Email -->
                    <p>Email</p>
                    <input type="text" name="Email" value="<?php echo "$Email"; ?>" disabled>
                    <article class="underline"></article>
                </article>

                <article class="email">
                    <!-- Password -->
                    <p>Password</p>
                    <input type="text" name="passWrd" value="<?php echo "$PassWrd"; ?>" disabled>
                    <article class="underline"></article>
                </article>

                <article class="phone">
                    <!-- Phone -->
                    <p>Phone</p>
                    <input type="text" name="phoneNo" value="<?php echo "$PhoneNo"; ?>" disabled>
                    <article class="underline"></article>
                </article>


            </section>

            <article class="create">
                <input type="submit" name="updateButton" id="save" value="Save">

            </article>

            <article class="edit">
                <input type="button" name="edit" id="edit" value="Edit">
            </article>

            <article class="trade">
                <p>Senq Marketplace &trade;</p>
            </article>
        </form>
    </section>
</body>

</html>

<script>
    document.querySelector("#edit").onclick = () => {
        var formValues = document.querySelectorAll("input")
        for (let i = 0; i < formValues.length; i++) {
            formValues[i].disabled = 0;
        }
    }
</script>