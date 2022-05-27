<?php
	session_start();
  require_once '../connect.php';
  $con=getConnect();  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="../nav.css">
    <script src="../jquery.min.js"></script>
    <script src="../index.js"></script>
     <!--font awesome-->
     <script src="https://kit.fontawesome.com/32afe344eb.js" crossorigin="anonymous"></script>
</head>
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
<?php

if(isset($_GET['cat']))
{
    $cat=$_GET['cat'];
    $id=$_GET['id'];
    $tsql="SELECT * FROM Product WHERE ProID='".$id."'";
    $getResults = sqlsrv_query($con, $tsql);

    if ($getResults === false) {
   echo "<h3>There is nothing to display</h3>";
   die();
    }
    else {
        while ($row = sqlsrv_fetch_array($getResults)) {
          
            echo '  <main>';
            echo ' <section class="container">';
            echo ' <section class="grid product">';
            echo ' <section class="column-xs-12 column-md-7">';
            echo ' <section class="product-gallery">';
            echo ' <section class="product-image">';
            echo '<img class="active" src="../../Admin/Product/'. $row['img'] ."\"". '.png style="width: 40%;" " alt="' . $row['img'] . '">';
            echo '</section>';
            echo ' <ul class="image-list">';
            echo '  <li class="image-item"><img class="active" src="../../Admin/Product/'. $row['img'] ."\"". '.png style="width: 30%;"" alt="' . $row['img'] . '"></li>';
            echo '  <li class="image-item"><img class="active" src="../../Admin/Product/'. $row['img'] ."\"". '.png style="width: 30%;"" alt="' . $row['img'] . '"></li>';
            echo '  <li class="image-item"><img class="active" src="../../Admin/Product/'. $row['img'] ."\"". '.png style="width: 30%;"" alt="' . $row['img'] . '"></li>';
            echo ' </ul>';
            echo '</section>';
            echo '</section>';
            
            echo ' <section class="column-xs-12 column-md-5">';
            echo ' <h1>'. $row['PName'] . '</h1>';
            echo ' <h2>'. $row['UPrice'] . '</h2>';
            echo ' <section class="description">';
            echo '<p>'. $row['ProDesc'] . '</p>';
            echo '</section>';
            echo ' <a href="../Cart/addToSession.php?id='. $row['ProID'] .'&cat='.$cat.'" class="add-to-cart"><i class="fa fa-cart-arrow-down"></i> Add to cart</a>';
            echo '</section>';
            echo '</section>';
            echo '</section>';
            echo '</section>';
            echo '</main>';
        }
        sqlsrv_free_stmt($getResults);
    }


}

?>
      <!-- <main>
        <section class="container">
          <section class="grid product">
            <section class="column-xs-12 column-md-7">
              <section class="product-gallery">
                <section class="product-image">
                  <img class="active" src="https://source.unsplash.com/W1yjvf5idqA">
                </section>
                <ul class="image-list">
                  <li class="image-item"><img src="https://source.unsplash.com/W1yjvf5idqA"></li>
                  <li class="image-item"><img src="https://source.unsplash.com/VgbUxvW3gS4"></li>
                  <li class="image-item"><img src="https://source.unsplash.com/5WbYFH0kf_8"></li>
                </ul>
              </section>
            </section>
            <section class="column-xs-12 column-md-5">
              <h1>Bonsai</h1>
              <h2>$19.99</h2>
              <section class="description">
                <p>The purposes of bonsai are primarily contemplation for the viewer, and the pleasant exercise of effort and ingenuity for the grower.</p>
                <p>By contrast with other plant cultivation practices, bonsai is not intended for production of food or for medicine. Instead, bonsai practice focuses on long-term cultivation and shaping of one or more small trees growing in a container.</p>
              </section>
              <button class="add-to-cart">Add To Cart</button>
            </section>
          </section>

          </section>
        </section>
      </main> -->
</body>
</html>
<script src="index.js"></script>