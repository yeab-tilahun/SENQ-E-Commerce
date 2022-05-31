<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Remove a Product</title>
    <link rel="stylesheet" href="RemoveProduct.css" />
  </head>
  <body>
   
    <?php
        require 'SP_loadTableAndRemoveProduct.php';
    ?>
    <form class="removeProd"  action="RemoveProduct.php" method="post" >
      <div class="removeProdTopArea">
      <table>
          <tr>
            <td>
              <input
                type="text"
                class="searchInput"
                placeholder="Search Item Here!"
                name="searchInput"
                value=""
              />
            </td>
            <td>
              <input
                class="searchButton"
                name="searchButton"
                value=""
                type="submit"
                />
            </td>
          </tr>
        </table>
      </div>
      <div class="removeProdMiddleArea">
        <table class="productListTable">
          <thead>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Stock</th>
            <th>Price</th>
          </thead>
          <tbody>
          <?php while($row = sqlsrv_fetch_array($result)):?>
                <tr onclick="getSelectedRowData(this)">
                    <td><?php echo $row['ProID'];?></td>
                    <td><?php echo $row['PName'];?></td>
                    <td><?php echo $row['Qty'];?></td>
                    <td><?php echo $row['UPrice'];?></td>
                </tr>
          <?php endwhile;?>
        </tbody>
        </table>
      </div>
      <div class="removeProdBottomArea">
        <div class="removeProdBottomAreaLeft">
          <table>
            <tr>
              <td>Product ID</td>
              <td>
                <input
                  type="text"
                  id="proID"
                  name="proID"
                  readonly
                  placeholder="No Product Selected"
                />
              </td>
            </tr>
            <tr>
              <td>Product Name</td>
              <td>
                <input
                  type="text"
                  id="proName"
                  readonly
                  placeholder="No Product Selected"
                />
              </td>
            </tr>
          </table>
        </div>
        <div class="removeProdBottomAreaRight">
          <input
                disabled
                id="removeButton"
                type="submit"
                name="removeButton"
                value="Remove"
                />
        </div>
      </div>
    </from>
  </body>
</html>

<script>
 // funcion called on row selected/clicked..to show selected item/row on the form below
 function getSelectedRowData(selectedRow){
  selectedRowTbldatas=selectedRow.querySelectorAll("td"); //returns array of <td> for selected row
   
   proID=selectedRowTbldatas[0].innerHTML; //getting the values of selected rows column/tableDatas
   proName=selectedRowTbldatas[1].innerHTML;

   document.querySelector("#proID").value=proID; //setting the form the values of the selected rows tabledatas/row
   document.querySelector("#proName").value=proName;

   document.querySelector("#removeButton").disabled=0; //enabling remove button
   
  }

</script>

