<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Product Price</title>
    <link rel="stylesheet" href="UpdatePrice.css" />
  </head>
  <body>
    <?php
        require 'SP_loadTableAndUpdatePrice.php';
    ?>
    <form class="updatePrice"  action="UpdatePrice.php" method="post">
      <div class="updatePriceTopArea">
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
      <div class="updatePriceMiddleArea">
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
      <div class="updatePriceBottomArea">
        <div class="updatePriceBottomAreaLeft">
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
            <tr>
                <td>Current Price</td>
                <td>
                    <input
                    type="text"
                    id="currentPrice"
                    readonly
                    placeholder="No Product Selected"
                  />
                </td>
              </tr>
          </table>     
        </div>
        <div class="updatePriceBottomAreaRight">
            <label for="newPrice">New Price</label>
            <input type="text" class="newPrice" name="newPrice">
            <br>
          <input
                disabled
                id="updateButton"
                type="submit"
                name="updateButton"
                value="Update"
           />
        </div>
      </div>
    </form>
  </body>
</html>


<script>

 // funcion called on row selected/clicked..to show selected item/row on the form below
 function getSelectedRowData(selectedRow){
  
  selectedRowTbldatas=selectedRow.querySelectorAll("td"); //returns array of <td> for selected row
   
   proID=selectedRowTbldatas[0].innerHTML; //getting the values of selected rows column/tableDatas
   proName=selectedRowTbldatas[1].innerHTML;
   currentPrice=selectedRowTbldatas[2].innerHTML;

   document.querySelector("#proID").value=proID; //setting the form the values of the selected rows tabledatas/row
   document.querySelector("#proName").value=proName;
   document.querySelector("#currentPrice").value=currentPrice; 

   document.querySelector("#updateButton").disabled=0; //enabling update button
   
}

</script>