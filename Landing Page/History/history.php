<?php
              require("../connect.php");
             $con = getConnect();
             session_start();
          ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>History</title>
  <link rel="stylesheet" href="history.css" />
  <link rel="stylesheet" href="../nav.css">
    <script src="../jquery.min.js"></script>
    <script src="../index.js"></script>
     <!--font awesome-->
     <script src="https://kit.fontawesome.com/32afe344eb.js" crossorigin="anonymous"></script>

  <script>
    // funcion called on row selected/clicked..to show selected item/row on the form below
    function getSelectedRowData(selectedRow) {
      selectedRowTbldatas = selectedRow.querySelectorAll("td"); //returns array of <td> for selected row

      TranID = selectedRowTbldatas[0].innerHTML; //getting the values of selected rows column/tableDatas

      document.querySelector("#selectedTransaction").value = TranID; //setting the form the values 
    }
  </script>
</head>

<body>
    <?php 
        require 'nav.php';
      ?>
<!-- history -->
  <form class="viewTran" action="ViewTran.php" method="post">
    <div class="viewTranMiddleArea">
      <h2 id="caption">Transaction</h2>
    <table class="transDetailsTable">
        <thead>
          <th>Product Name</th>
          <th>Unit Price</th>
          <th>Quantity</th></th>
          <th>Product Total Cost</th>
        </thead>
        <tbody>
          <?php
            //Preparing Query
            $custid=$_SESSION['CustID'];
            $sqltranDetails="Exec USP_ViewTransactionsCustomer @CustID='$custid'";
            
            //Executing query to load transation details
            $resultTranDetails = sqlsrv_query($con, $sqltranDetails);
            if (!$resultTranDetails) {
              die(print_r(sqlsrv_errors()));
            }
            ?>
            <?php while ($row = sqlsrv_fetch_array($resultTranDetails)) : ?>
              <tr>
                <td><?php echo $row['PName']; ?></td>
                <td><?php echo $row['UPrice']; ?></td>
                <td><?php echo $row['Qty']; ?></td>
                <td><?php echo $row['ProductTotal']; ?></td>
              </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </form>
</body>
</html>