<?php
  require '../connect.php';
  $con=getConnect();
  session_start();
  if(isset($_GET['checkout'])){

    $qty=$_GET["qty"];

    $result=sqlsrv_query($con,"Exec USP_GetLastTranID");
    if($result==false){
      die(print_r(sqlsrv_errors(), true));
    }
    $row = sqlsrv_fetch_array($result); 
    $lastTranID=$row['TranID'];
    if($lastTranID==null){
        $lastTranID=0;
    }
    $CurrentTranID=$lastTranID+1;

    for ($i=0; $i<count($_SESSION['cart']); $i++){
         $sql="Exec USP_TransactionsDetails
         @ProID=".$_SESSION["cart"][$i].",
         @Qty=".$qty[$i].",
         @TranID=".$CurrentTranID;
         sqlsrv_query($con,$sql);
    }  

    $CustID=$_SESSION["CustID"];
    $sqlMakeFinalTran="Exec USP_MakeTransaction @CustID=$CustID";
    sqlsrv_query($con,$sqlMakeFinalTran);   
    // up to this point means transaction is done succefully

    // deleting stored items
     unset($_SESSION['cart']);
    // fix meeeeeeeeeeeeeeeee
     header("location: ../paypal.html");
  }





   if(isset($_GET["id"])){
    echo $_GET['id'];
    // remove the id from our cart array
     $key = array_search($_GET['id'], $_SESSION['cart']);  
    unset($_SESSION['cart'][$key]);

    // rearrange array after unset
    $_SESSION['cart'] = array_values($_SESSION['cart']);

    if(count($_SESSION['cart'])==0){
      echo "<script>document.body.getElementsByClassName(\"shopping-cart\")[0].firstChild.nextElementSibling.textContent=\"Shopping Cart is Empty\"
      </script>";
    }
    $count=count($_SESSION['cart']);
    echo "<script>document.querySelector('.count_cart').innerHTML='($count)';</script>";
     header('location: index.php');
  }





?>