<?php 
    require("../connect/connect.php");
    $con=getConnect();    


    if(isset($_POST["updateButton"])){

        //Preparing Query
        $sqlUpdate="Exec USP_AddProductQty
        @ProID='".$_POST["proID"]."',
        @Amount='".$_POST["newStock"]."'
        ";

        //Executing the Add New Stock Query
        if(sqlsrv_query($con,$sqlUpdate)){
              echo "<script>
                       alert ('Action Successfull');
               </script>";
        }else{
              echo "<script>
                       alert ('Action Failed');
               </script>";
               die(print_r(sqlsrv_errors()));
        } 
    } 

    
    //Prepareing SQL statment to load table
    $sql;
    if(isset($_POST["searchButton"]) && isset($_POST["searchInput"])) {
        $sql="Exec USP_AllProductList @searchInput='".$_POST["searchInput"]."'";
        
    }else{
        $sql="Exec USP_AllProductList @searchInput=''";
    }

    //Execting Query to get table data
    $result=sqlsrv_query($con,$sql);
    if($result===false){
         die(print_r(sqlsrv_errors(), true));
     }
     //Now result is stored in $result variable and can be accesed in the other file
     
        
?>
