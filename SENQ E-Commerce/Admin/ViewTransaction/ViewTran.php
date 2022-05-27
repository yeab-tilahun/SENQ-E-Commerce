<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>View Transactions</title>
  <link rel="stylesheet" href="ViewTran.css" />

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
  <form class="viewTran" action="ViewTran.php" method="post">
    <div class="viewTranMiddleArea">
      <h2 id="caption">Transaction</h2>
      <table class="transTable">
        <thead>
          <th>Transaction ID</th>
          <th>Customer ID</th>
          <th>Total</th>
          <th>Date</th>
        </thead>
        <tbody>

          <?php
              require("../connect/connect.php");
             $con = getConnect();
             //Prepareing SQL statment to load Transactions Table
             $sqlTran = "Exec USP_ViewAllTransactions ''";
             //Execting Query to get table data
             $resultTran = sqlsrv_query($con, $sqlTran);
             if ($resultTran === false) {
               die(print_r(sqlsrv_errors()));
             }
          ?>
          <?php while ($row = sqlsrv_fetch_array($resultTran)) : ?>
            <tr onclick="getSelectedRowData(this)">
              <td><?php echo $row['TranID']; ?></td>
              <td><?php echo $row['CustID']; ?></td>
              <td><?php echo $row['Total']; ?></td>
              <td><?php echo $row['Date']; ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
    <div class="viewTranBottomArea">
      <h2 id="caption">Transaction Details</h2>
      <br>
      <span style="height: 50px; font-size: 1.2em;"> Selected Transaction</span>
      <input id="selectedTransaction" name="selectedTransaction" value="0" type="text" readonly />
      <input id="searchTranDetailBtn" name="searchTranDetailBtn" type="submit" value="Get Transaction Details" style="background-color: lightblue; height: 50px; color: white; font-size: 1.4em;"/>
      <table class="transDetailsTable">
        <thead>
          <th>Product ID</th>
          <th>Unit Price</th>
          <th>Qty</th>
          <th>Product Total</th>
        </thead>
        <tbody>
          <?php
          if (isset($_POST["searchTranDetailBtn"]) && $_POST["selectedTransaction"] != 0) {
            //Preparing Query
            $SelectedTransaction=$_POST["selectedTransaction"];
            $sqltranDetails="Exec USP_ViewTransactionsDetails @TranID='$SelectedTransaction'";

            //Executing query to load transation details
            $resultTranDetails = sqlsrv_query($con, $sqltranDetails);
            if (!$resultTranDetails) {
              die(print_r(sqlsrv_errors()));
            }
            ?>
            <?php while ($row = sqlsrv_fetch_array($resultTranDetails)) : ?>
              <tr>
                <td><?php echo $row['ProID']; ?></td>
                <td><?php echo $row['UPrice']; ?></td>
                <td><?php echo $row['Qty']; ?></td>
                <td><?php echo $row['ProductTotal']; ?></td>
              </tr>
          <?php endwhile;
          } ?>
        </tbody>
      </table>
    </div>
  </form>
</body>
</html>