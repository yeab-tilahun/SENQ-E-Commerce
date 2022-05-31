<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="index.css">
     <!--font awesome-->
     <script src="https://kit.fontawesome.com/32afe344eb.js" crossorigin="anonymous"></script>
</head>
<body>
    <section class="navigation"  class="navbar fixed-top topnav">
        <div class="nav-container">
          <div class="brand">
            <a href="#!"><img src="images/Vector Smart Object.png" class="logo" width="90%" alt=""></a>
          </div>

          <nav>
            <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
            <ul class="nav-list">
              <li>
           <form action="Products/index.php" method="get">     
                 <!-- search with category -->
          <section class="search-with-cat" id="topC">
          <select onchange="validate()" name="cat" id="cat-for-search" class="combo-box">
          <option value="All" selected>All</option>
          <option value="Electronics">Electronics</option>
          <option value="Cloths">Cloths</option>
          <option value="Furniture">Furniture</option>
          <option value="Beauty Supplies">Beauty Supplies</option>
          <option value="Office Supplies">Office Supplies</option>
          <option value="Sport and Fitness">Sport and Fitness</option>
          <option value="Books">Books</option>
          <option value="Computer and  Accessories">Computer and Accessories</option>
          <option value="Other">Other</option>
            </select>
            <input type="text" name="search_input" id="" class="search-box" placeholder="Search for products">
         
           <input 
            style="background-color: #DAE5D0;
                   color: white;
                   font-size: 1.2em;
                   width: 100px; 
                   top: 2px;
                   color: #112B3C;
                   "  
           type="submit" name="search-btn" id="search-go" class="search-btn" value="search"></input>
           </form>
       
          </section>
              </li>
              <li>
                <a href="#!"><abbr title="Profile"><i class="fa-solid fa-circle-user fa-2x" id="icon1"></i></a>
                <ul class="nav-dropdown">
                  <li>
                    <a href="MyProfile/MyProfile.php">My Profile</a>
                  </li>
                  <li>
                    <a href="History/history.php">History</a>
                  </li>
                  <li>
                    <a href="sp_deleteAccount.php">Delete Account</a>
                  </li>
                </ul>
              </li>
              
              <li>
                <a href="Cart/index.php" type="submit"><abbr title="My cart"><i class="fa-solid fa-cart-arrow-down fa-2x" style="margin-bottom: 4px;" id="icon2"></i><span class="count_cart"
                        style="font-size: 1em;"
                ><?php 
                                                          session_start();
                                                          if(!isset($_SESSION['cart']) || ($_SESSION['cart'])==null){
                                                            echo '( 0 )';
                                                          }else{
                                                            echo '( '.count($_SESSION["cart"]).' )';
                                                            }
                                                         ?>
               </span></a>                  
              </li>
              <li>
                <a href="SignIn & SignUp/Sign.php"><abbr title="Log In"><i class="fa-solid fa-arrow-right-to-bracket fa-2x"></i></a>
              </li>
              <li>
                <a href="logout.php"><abbr title="Log Out"><i class="fa-solid fa-arrow-right-from-bracket fa-2x"></i></a>
              </li>
            </ul>
         
          </nav>
        </div>
      </section>

      <!-- FIRST PAGE SLIDER -->

      <section class="main">
  
        <section class="cd-slider">
          <ul>
          <li>
              <section class="image" style="background-image:url(https://i.ibb.co/C9hkdD7/sofa.png);"></section>
              <section class="content">
                <h2>Furnitures</h2>
              </section>
            </li>
            <li>
              <section class="image" style="background-image:url(https://img.freepik.com/free-photo/gamer-workspace_127657-18874.jpg?w=1380);"></section>
              <section class="content">
                <h2>Accessories</h2>
              </section>
            </li>
            <li>
              <section class="image" style="background-image:url(https://img.freepik.com/free-photo/stylish-men-s-leather-boot-with-untied-laces-white-background_175682-30370.jpg?w=1380);"></section>
              <section class="content">
                <h2>Shoes</h2>
              </section>
            </li>
            <li>
              <section class="image" style="background-image:url(https://img.freepik.com/free-photo/knitted-sweater-wooden-background_169016-3697.jpg?t=st=1653823612~exp=1653824212~hmac=bdc07ddfd3e1d51e1d7d73f4fb83294d1fdd827a9191e786f762e274967ca685&w=740);"></section>
              <section class="content">
                <h2>Winter Collection</h2>
              </section>
            </li>
            <li>
              <section class="image" style="background-image:url(https://images.unsplash.com/photo-1650602356313-79daae307eaf?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=464&q=80);"></section>
              <section class="content">
                <h2>Traditional Clothes</h2>
              </section>
            </li>      
          </ul>
        </section> <!--/.cd-slider-->
        
        
      </section>



       <!-- Shop with category -->
  <section class="main-container-all">                                                        
    <h1>Shop with category</h1>
    <section class="main-container">
      <section>
          <section class="sub-main">
              <h4>Electronics</h4>
              <img src="https://img.freepik.com/free-photo/gamer-workspace_127657-18683.jpg?w=1380" alt="category-image" class="sub-main-img">
              <?php $cat="Electronics"; $search_input=''?>
              <?php echo "<a class=\"shop-now\"  href=\"Products/index.php?search_input=$search_input&cat=$cat\">Shop now</a>"?>
          </section>

      </section>

      <section class="sub-main">
          <h4>Furntiure</h4>
          <img src="Images/furntiure.jpg" alt="category-image" class="sub-main-img">
          <?php $cat="Furntiure"; $search_input=''?>
          <?php echo "<a class=\"shop-now\"  href=\"Products/index.php?search_input=$search_input&cat=$cat\">Shop now</a>"?>
      </section> 
      <section class="sub-main">
          <h4>Cloths</h4>
          <img src="https://img.freepik.com/free-photo/men-s-clothing-set-with-oxford-shoes-watch-sunglasses-office-shirt-tie-jacket-isolated-white-background-top-view_107612-80.jpg?w=1380" alt="category-image" class="sub-main-img">
          <?php $cat="Cloths"; $search_input=''?>
          <?php echo "<a class=\"shop-now\"  href=\"Products/index.php?search_input=$search_input&cat=$cat\">Shop now</a>"?>
      </section>

      <section class="sub-main">
          <h4>Beauty Supplies</h4>
          <img src="https://img.freepik.com/free-photo/flatlay-row-makeup-beauty-care-accessories-light-grey-surface_274679-35661.jpg?w=740" alt="category-image" class="sub-main-img">
          <?php $cat="Beauty Supplies"; $search_input=''?>
          <?php echo "<a class=\"shop-now\"  href=\"Products/index.php?search_input=$search_input&cat=".urlencode($cat)."\">Shop now</a>"?>
      </section>
  </section>
  <section style="margin-top: 30px;"></section>

  <section class="main-container">
      <section class="sub-main">
          <h4>Office supplies</h4>
          <img src="https://img.freepik.com/free-psd/high-view-supplies-arrangement-knolling-desk-concept_23-2148428012.jpg?t=st=1653821447~exp=1653822047~hmac=06f9f10277d92a0692a1c6c3c11c91a3b01031e8b3a9f90444b8b88fe7e760de&w=740g" alt="category-image" class="sub-main-img">
          <?php $cat="Office supplies"; $search_input=''?>
              <?php echo "<a class=\"shop-now\"  href=\"Products/index.php?search_input=$search_input&cat=".urlencode($cat)."\">Shop now</a>"?>

      </section>
      <section class="sub-main">
          <h4>Books</h4>
          <img src="https://img.freepik.com/free-photo/books-randomly-stacked-shelf_23-2147846041.jpg?w=1380" alt="category-image" class="sub-main-img">
          <?php $cat="Books"; $search_input=''?>
              <?php echo "<a class=\"shop-now\"  href=\"Products/index.php?search_input=$search_input&cat=$cat\">Shop now</a>"?>

      </section>

      <section class="sub-main">
          <h4>Computers & Accessories</h4>
          <img src="Images/computer.jpg" alt="category-image" class="sub-main-img">
          <?php $cat="Computer and  Accessories"; $search_input=''?>
              <?php echo "<a class=\"shop-now\"  href=\"Products/index.php?search_input=$search_input&cat=".urlencode($cat)."\">Shop now</a>"?>

      </section>
      <section class="sub-main">
          <h4>For your Fitness Needs</h4>
          <img src="Images/For your Fitness Needs.jpg" alt="category-image" class="sub-main-img">
          <?php $cat="Sport and Fitness"; $search_input=''?>
            <?php echo "<a class=\"shop-now\"  href=\"Products/index.php?search_input=$search_input&cat=".urlencode($cat)."\">Shop now</a>"?>

      </section>
  </section>
  </section>                                                        
  <section class="features">
      <img src="Images/Service 01.png" alt=""  id="feature">
      <img src="Images/Service 02.png" alt=""  id="feature">
      <img src="Images/Service 03.png" alt=""  id="feature">
  </section>


  <!-- WHY YODAHE?? -->
  <!-- <script type="text/javascript">
      let image= document.getElementById('feature');
      image.background=line
  </script> -->


 <!-- Latest, Bestseller, Rating -->
 <section class="product-box">

  <section class="product-minimal">

      <section class="product-showcase">

          <h2 class="title">Latest</h2>
          <section class="showcase-container">

              <section class="showcase">

                  <a href="#" class="showcase-img-box">
                      <img src="Images/jacket-5.jpg" alt="men yarn fleece full-zip jacket" class="showcase-img">
                  </a>

                  <section class="showcase-content">

                      <a href="#">
                          <h4 class="showcase-title">Full-Zip Jacket</h4>
                      </a>

                      <section class="price-box">
                          <p class="price">$61.00</p>
                      </section>
                      <button class="addtocart">Add To Cart</button>
                  </section>

              </section>


              <section class="showcase">

                  <a href="#" class="showcase-img-box">
                      <img src="Images/jacket-1.jpg" alt="mens winter leathers jackets" class="showcase-img">
                  </a>

                  <section class="showcase-content">

                      <a href="#">
                          <h4 class="showcase-title"> Leathers Jackets</h4>
                      </a>



                      <section class="price-box">
                          <p class="price">$32.00</p>
                      </section>
                      <button class="addtocart">Add To Cart</button>

                  </section>

              </section>

              <section class="showcase">

                  <a href="#" class="showcase-img-box">
                      <img src="Images/jacket-3.jpg" alt="mens winter leathers jackets" class="showcase-img">
                  </a>

                  <section class="showcase-content">

                      <a href="#">
                          <h4 class="showcase-title">Leathers Jackets</h4>
                      </a>

                      <section class="price-box">
                          <p class="price">$50.00</p>
                      </section>
                      <button class="addtocart">Add To Cart</button>

                  </section>

              </section>

              <section class="showcase">

                  <a href="#" class="showcase-img-box">
                      <img src="Images/shorts-1.jpg" alt="better basics french terry sweatshorts"
                          class="showcase-img">
                  </a>

                  <section class="showcase-content">

                      <a href="#">
                          <h4 class="showcase-title"> Sweatshorts</h4>
                      </a>

                      <section class="price-box">
                          <p class="price">$20.00</p>
                      </section>
                      <button class="addtocart">Add To Cart</button>

                  </section>

              </section>


          </section>

      </section>



      <section class="product-showcase">

          <h2 class="title">Bestseller</h2>

          <section class="showcase-container">

              <section class="showcase">

                  <a href="#" class="showcase-img-box">
                      <img src="Images/sports-6.jpg" alt="air tekking shoes - white" class="showcase-img">
                  </a>

                  <section class="showcase-content">

                      <a href="#">
                          <h4 class="showcase-title">Air Trekking Shoes - white</h4>
                      </a>

                      <section class="price-box">
                          <p class="price">$52.00</p>
                      </section>
                      <button class="addtocart">Add To Cart</button>

                  </section>

              </section>


              <section class="showcase">

                  <a href="#" class="showcase-img-box">
                      <img src="Images/shoe-3.jpg" alt="Boot With Suede Detail" class="showcase-img">
                  </a>

                  <section class="showcase-content">

                      <a href="#">
                          <h4 class="showcase-title">Boot With Suede Detail</h4>
                      </a>

                      <section class="price-box">
                          <p class="price">$20.00</p>
                      </section>
                      <button class="addtocart">Add To Cart</button>

                  </section>

              </section>

              <section class="showcase">

                  <a href="#" class="showcase-img-box">
                      <img src="Images/shoe-1.jpg" alt="men's leather formal wear shoes" class="showcase-img">
                  </a>

                  <section class="showcase-content">

                      <a href="#">
                          <h4 class="showcase-title">Men's Leather Formal Wear shoes</h4>
                      </a>

                      <section class="price-box">
                          <p class="price">$56.00</p>
                      </section>
                      <button class="addtocart">Add To Cart</button>

                  </section>

              </section>

              <section class="showcase">

                  <a href="#" class="showcase-img-box">
                      <img src="Images/shoe-2.jpg" alt="casual men's brown shoes" class="showcase-img">
                  </a>

                  <section class="showcase-content">

                      <a href="#">
                          <h4 class="showcase-title">Casual Men's Brown shoes</h4>
                      </a>

                      <section class="price-box">
                          <p class="price">$50.00</p>
                      </section>
                      <button class="addtocart">Add To Cart</button>

                  </section>

              </section>

          </section>

      </section>


      <section class="product-showcase">

          <h2 class="title">Top Rated</h2>

          <section class="showcase-container">

              <section class="showcase">

                  <a href="#" class="showcase-img-box">
                      <img src="Images/jewellery-2.jpg" alt="platinum zircon classic ring" class="showcase-img">
                  </a>

                  <section class="showcase-content">

                      <a href="#">
                          <h4 class="showcase-title">platinum Zircon Classic Ring</h4>
                      </a>

                      <section class="price-box">
                          <p class="price">$62.00</p>
                      </section>
                      <button class="addtocart">Add To Cart</button>

                  </section>

              </section>


              <section class="showcase">

                  <a href="#" class="showcase-img-box">
                      <img src="Images/watch-1.jpg" alt="smart watche vital plus" class="showcase-img">
                  </a>

                  <section class="showcase-content">

                      <a href="#">
                          <h4 class="showcase-title">Smart watche Vital Plus</h4>
                      </a>

                      <section class="price-box">
                          <p class="price">$56.00</p>
                      </section>
                      <button class="addtocart">Add To Cart</button>

                  </section>

              </section>

              <section class="showcase">

                  <a href="#" class="showcase-img-box">
                      <img src="Images/shampoo.jpg" alt="shampoo conditioner packs" class="showcase-img">
                  </a>

                  <section class="showcase-content">

                      <a href="#">
                          <h4 class="showcase-title">shampoo conditioner packs</h4>
                      </a>

                      <section class="price-box">
                          <p class="price">$20.00</p>
                      </section>
                      <button class="addtocart">Add To Cart</button>

                  </section>

              </section>

              <section class="showcase">
                  <a href="#" class="showcase-img-box">
                      <img src="Images/jewellery-1.jpg" alt="rose gold peacock earrings" class="showcase-img">
                  </a>

                  <section class="showcase-content">

                      <a href="#">
                          <h4 class="showcase-title">Rose Gold Peacock Earrings</h4>
                      </a>

                      <section class="price-box">
                          <p class="price">$20.00</p>
                      </section>
                      <button class="addtocart">Add To Cart</button>

                  </section>

              </section>

          </section>

      </section>

  </section>

</section>


<!-- trending brands -->
<section class="trend-section">
  <section class="trending-label">
      <h2>Trending Brands</h2>
  </section>
  <section class="trending">
    <img src="Images/tommy.jpg" class="trending-brnads fade brands-mob" alt="" width="256" >

  <img src="Images/nike.jpg" class="trending-brnads fade brands-mob" alt="" width="256">

  <img src="Images/mac.png" class="trending-brnads fade brands-mob" alt="" width="256" height="256">

  <img src="Images/samsung.png" class="trending-brnads fade brands-mob" alt="" width="256" height="256">

  </section>
</section>


 <!-- Back to top button -->
 <a href="#" class="back-to-top-link"><button class="button-35" role="button"><h6>Back to top</h6></button></button></a>
           
 
 <!-- FOOTER START -->
            <footer class="footer">
              <section class="contain">
              <section class="col">
                <h1>Company</h1>
                <ul>
                  <li>About</li>
                  <li>Mission</li>
                  <li>Services</li>
                  <li>Social</li>
                  <li>Get in touch</li>
                </ul>
              </section>
              <section class="col">
                <h1>Products</h1>
                <ul>
                  <li>Prices drop</li>
                  <li>New products</li>
                  <li>Best sales</li>
                  <li>Contact us</li>
                  <li>Sitemap</li>
                </ul>
              </section>
              <section class="col">
                <h1>Accounts</h1>
                <ul>
                  <li>About</li>
                  <li>Mission</li>
                  <li>Services</li>
                  <li>Social</li>
                  <li>Get in touch</li>
                </ul>
              </section>
              <section class="col">
                <h1>Resources</h1>
                <ul>
                  <li>Delivery</li>
                  <li>Redeem code</li>
                  <li>Legal Notice</li>
                  <li>Site map</li>
                  <li>Web templates</li>
                  <li>Email templates</li>
                </ul>
              </section>
              <section class="col">
                <h1>Support</h1>
                <ul>
                  <li>Contact us</li>
                  <li>Web chat</li>
                  <li>Open ticket</li>
                </ul>
              </section>
              <section class="col social">
                <h1>Social</h1>
                <ul>
                  <li><i class="fa-brands fa-facebook fa-2x"></i></li>
                  <li><i class="fa-brands fa-instagram fa-2x"></i></li>
                  <li><i class="fa-brands fa-twitter fa-2x"></i></li>
                </ul>
              </section>
            <section class="clearfix"></section>
            </section>
            
            <section class="footer-bottom">

              <section class="container">
  
                  <img src="Images/payment.png" alt="payment method" class="payment-img">
  
                  <p class="copyright">
                      Copyright &copy; <a href="#">SENQ</a> all rights reserved.
                  </p>
  
              </section>
  
          </section>
            </footer>
            <!-- END OF FOOTER -->



            <!-- Cookies notice -->
      <section id="cookies" onclick="  $('#cookies').hide();" style="font-family:Lato,Roboto,sans-serif;font-weight:100;font-size:.9em;background-color:#5F7161;padding:.6em;text-align:center;border-radius:.2em;position:fixed;bottom:0;width:100%;">
        <span class="cookies-notice" style="color:#fff;">
        This site requires cookies to function properly. You may disable cookies in browser settings.
        </span>
                <span class="cookies-button" style="color:#191919;background-color:#c3db6a;padding:0.1em;margin-left:20px;cursor:pointer;border-radius:.2em;">
                I understand
                </span>
  </section>
</body>
</html>
<script src="jquery.min.js"></script>
<script src="index.js"></script>