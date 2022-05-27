<?php
    require '../connect.php';
    $con=getConnect();
    session_start();
    $qty=$_POST["qty"];

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
    $sqlMakeFinalTran="Exec USP_MakeTransaction @CustID=1";
    sqlsrv_query($con,$sqlMakeFinalTran);   
    //up to this point means transaction is done succefully


    //deleting stored items
    unset($_SESSION['cart']);


    
    // fix meeeeeeeeeeeeeeeee
    echo " <script>alert('Purchase Successfull!') </script>";
    header("location: ../index.php");

?>