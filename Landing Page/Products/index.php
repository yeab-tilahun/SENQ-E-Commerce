<?php
require_once '../connect.php';
$con = getConnect();

session_start();
//initialize cart if not set or is unset
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="../nav.css">
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/32afe344eb.js" crossorigin="anonymous"></script>
    <script src="../jquery.min.js"></script>
    <script src="../index.js"></script>
    <!--font awesome-->
    <script src="https://kit.fontawesome.com/32afe344eb.js" crossorigin="anonymous"></script>
</head>

<body>
    <a id="goback" href='../index.php'><i class="fa-solid fa-arrow-left"></i>&nbsp; Go Back</a>

    <!-- product -->
    <section class="wrapper">
        <section class="content">
            <!-- content here -->
            <section class="product-grid product-grid--flexbox">
                <section class="product-grid__wrapper">

                    <?php

                    $cat = $_GET['cat'];
                    $Search_input = $_GET['search_input'];

                    $tsql = "Exec USP_ProductList
                     @searchInput='" . $Search_input . "',
                    @catagName='" . $cat . "'";
                    $getResults = sqlsrv_query($con, $tsql);

                    if ($getResults === false) {
                        echo "<h3>There is nothing to display</h3>";
                    } else {
                        while ($row = sqlsrv_fetch_array($getResults)) {
                            echo ' <section class="product-grid__product-wrapper">';
                            echo ' <section class="product-grid__product">';
                            echo ' <section class="product-grid__img-wrapper">';
                            echo '<img src="../../Admin/Product/' . $row['img'] . "\"" . '.png style="width: 50%;"" alt="' . $row['img'] . '">';
                            echo '</section>';
                            echo ' <span class="product-grid__title">' . $row['PName'] . '</span>';
                            echo ' <span class="product-grid__price">' . $row['UPrice'] . '</span>';
                            echo '<section class="product-grid__extend-wrapper">';
                            echo '<section class="product-grid__extend">';
                            echo '<p class="product-grid__description">' . $row['ProDesc'] . '</p>';
                            echo ' <a href="../Cart/addToSession.php?id=' . $row['ProID'] . '&cat=' . $cat . '" class="product-grid__btn product-grid__add-to-cart"><i class="fa fa-cart-arrow-down"></i> Add to cart</a>';
                            echo ' <a href="../Disp_Product/index.php?id=' . $row['ProID'] . '&cat=' . $cat . '" class="product-grid__btn product-grid__view"><i class="fa fa-eye"></i> View more</a>';
                            echo '</section>';
                            echo '</section>';
                            echo '</section>';
                            echo '</section>';
                        }
                        sqlsrv_free_stmt($getResults);
                    }
                    ?>
                </section>
            </section>
        </section>
    </section>


</body>

</html>
<script src="../jquery.min.js"></script>
<script>
    $('.product-grid__view').click(function() {
        window.location.href = '../Disp_Product/index.php';
    });
</script>

