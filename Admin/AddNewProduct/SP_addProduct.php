<?php 

    require("../connect/connect.php");
    $con=getConnect();    

    //When Add Btn is Clicked
    if(isset($_POST["addProd"])){
          //code below is to get the lastProductID so we know what will be the ProductID of the Product we are about to insert, this will help in naming the product img file
          $result=sqlsrv_query($con,"Exec USP_GetLastProductID");
          if($result==false){
            die(print_r(sqlsrv_errors(), true));
          }
          $row = sqlsrv_fetch_array($result); 
          $lastProID=$row['ProID'];
          if($lastProID==null){
              $lastProID=0;
          }
          $theCurrentProductID=$lastProID+1;

      
          //code below is uploading product img from  Image Input Element to project folder
          $proImgName=$_FILES['imgFile']['name'];
          $proImgTempName=$_FILES["imgFile"]["tmp_name"];
          move_uploaded_file($proImgTempName, "../Product/".$theCurrentProductID.".png");
          //product photo has been uploaded now

          
        
        //Prepareing SQL statment to add product
        $sql="Exec USP_AddNewProduct
        @Pname='".$_POST["prodName"]."',
        @UPrice='".$_POST["uprice"]."',
        @catagName='".$_POST["catag"]."',
        @Qty='".$_POST["stock"]."',
        @ProDesc='".$_POST["textArea"]."',
        @img='".$theCurrentProductID."'
        ";

        //Executing the Add New Products Query
        $result=sqlsrv_query($con,$sql);
        if($result){
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
?>