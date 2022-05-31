      <script src="https://kit.fontawesome.com/32afe344eb.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="index.css">
      <style>
        .navigation{
          display: block;
          position: absolute;
          z-index: 999;
          width: 100%;
          height: 10%;
        }
      </style>
     <section class="navigation"  class="navbar fixed-top topnav">
      <div class="nav-container">
        <div class="brand">
          <a href="#!"><img src="images/Vector Smart Object.png" class="logo" width="100%" alt=""></a>
        </div>

        <nav>
          <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
          <ul class="nav-list">
            <li>
        <form action="Products/index.php" method="get">     
               <!-- search with category -->
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
            </li>
            <li>
              <a href="#!" ><abbr title="Profile"><i class="fa-solid fa-circle-user fa-2x" id="icon1"></i></a>
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
<script src="jquery.min.js"></script>
<script src="index.js"></script>
