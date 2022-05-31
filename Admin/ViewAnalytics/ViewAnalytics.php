<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Analytics</title>
    <link rel="stylesheet" href="ViewAnalytics.css" />
  </head>
  <body>
    <?php 

       require("../connect/connect.php");
       $con=getConnect(); 

       $NumOfCustomers;
       $NumOfActiveProd;
       $NumOfRemovedProd;
       $TotalRevenue;


       $result1=sqlsrv_query($con,"select count(custID) from Customers");
       if($row=sqlsrv_fetch_array($result1)) {
            $NumOfCustomers=$row[0];
       } 
       
       $result2=sqlsrv_query($con,"select count(ProID) from Product Where ProStatus=1");
       if($row=sqlsrv_fetch_array($result2)) {
           $NumOfActiveProd=$row[0];
       } 
       
       $result3=sqlsrv_query($con,"select count(ProID) from Product Where ProStatus=0");
       if($row=sqlsrv_fetch_array($result3)) {
          $NumOfRemovedProd=$row[0];
       } 
       
       $result4=sqlsrv_query($con,"select sum(Total) from Transactions");
       if($row=sqlsrv_fetch_array($result4)) {
          $TotalRevenue=$row[0].' $';
       } 

    
    
    ?>
    <div class="viewAnalyics" >
      <table>
        <tr>
          <td>Num of Customers</td>
          <td><?php echo $NumOfCustomers ?></td>
        </tr>
        <tr>
          <td>Num of Active Products</td>
          <td><?php echo $NumOfActiveProd ?></td>
        </tr>
        <tr>
          <td>Discontinued Products</td>
          <td><?php echo $NumOfRemovedProd ?></td>
        </tr>
        <tr>
          <td>Total Revenue Generated</td>
          <td><?php echo $TotalRevenue ?></td>
        </tr>
      </table>
    </form>
  </body>
</html>
