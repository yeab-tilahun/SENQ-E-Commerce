<?php
        require_once '../connect.php';
        $con=getConnect();  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <section class="wrapper">
    
        <section class="content">
            <!-- content here -->
            <section class="product-grid product-grid--flexbox">
                <section class="product-grid__wrapper">
                    

 <?php

if(isset($_GET['cat']))
{
    $cat=$_GET['cat'];

    // $tsql = sqlsrv_query($con,"Exec USP_GetLastProductID");
    $tsql="Exec USP_ProductList
    @searchInput='',
    @catagName='".$cat."'";
    $getResults = sqlsrv_query($con, $tsql);

    #PHP_EOL gives you new line
        // echo('Reading data from table' . PHP_EOL);

    if ($getResults === false) {
   echo "<h3>There is nothing to display</h3>";
   die();
    }
    else {
        while ($row = sqlsrv_fetch_array($getResults)) {
            echo ' <section class="product-grid__product-wrapper">';
            echo ' <section class="product-grid__product">';
            echo ' <section class="product-grid__img-wrapper">';
            echo '<img src="../img/'. $row['img'] ."\"". '.png style="width: 50%;"" alt="' . $row['img'] . '">';
            echo '</section>';
            echo ' <span class="product-grid__title">'. $row['PName'] . '</span>';
            echo ' <span class="product-grid__price">'. $row['UPrice'] . '</span>';
            echo '<section class="product-grid__extend-wrapper">';
            echo '<section class="product-grid__extend">';
            echo '<p class="product-grid__description">' . $row['ProDesc'] . '</p>';
            echo ' <span class="product-grid__btn product-grid__add-to-cart"><i class="fa fa-cart-arrow-down"></i> Add to cart</span>';
            echo ' <span class="product-grid__btn product-grid__view"><i class="fa fa-eye"></i> View more</span>';
            echo '</section>';
            echo '</section>';
            echo '</section>';
            echo '</section>';
        }
        sqlsrv_free_stmt($getResults);
    }


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
    $('.product-grid__view').click(function(){
        window.location.href='../Disp_Product/index.html';
    });


</script>