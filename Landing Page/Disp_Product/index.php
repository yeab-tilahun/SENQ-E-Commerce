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
     <!--font awesome-->
     <script src="https://kit.fontawesome.com/32afe344eb.js" crossorigin="anonymous"></script>
</head>
<body>

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
</body>
</html>