<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add New Product</title>
    <link rel="stylesheet" href="AddNewProd.css" />
  </head>
  <body>
    <?php
          require 'SP_addProduct.php';
    ?>
    <form class="addProdForm" action="AddNewProd.php" method="post" enctype='multipart/form-data'>
      <div class="formLeft">
        <p>Product Name</p>
        <input
          class="inputTextField"
          type="text"
          name="prodName"
          id="prodName"
          max="20"
          required
        />
        <p>Unit Price</p>
        <input
          class="inputTextField"
          type="text"
          name="uprice"
          id="uprice"
          max="10"
          required
        />
        <p>Catagory</p>
        <select class="inputTextField" name="catag" id="catag" required>
          <option value="Electronics">Electronics</option>
          <option value="Cloths">Cloths</option>
          <option value="Furniture">Furniture</option>
          <option value="Beauty Supplies">Beauty Supplies</option>
          <option value="Office Supplies">Office Supplies</option>
          <option value="Sport and Fitness">Sport and Fitness</option>
          <option value="Books">Books</option>
          <option value="Computer and Accessories">Computer and Accessories</option>
          <option value="Other">Other</option>
        </select>
        <p>Initial Stock</p>
        <input
          class="inputTextField"
          type="text"
          name="stock"
          id="stock"
          max="20"
          required
          />
        <p>Description</p>
        <textarea
          name="textArea"
          id="textArea"
          class="inputTextArea"
          cols="35"
          rows="5"
         placeholder="Product Description Here!"
         required
        ></textarea>
      </div>
      <div class="formRight">
        <p>Upload Product Images</p>
          <div id="imgFilePanel">
            <img src="../icons/imagePlaceholder.png" alt="" />
            <input type="file" name="imgFile" id="imgFile" accept=".png" required />
            <label for="imgFile"></label>
          </div>
        <input
          class="submitButton"
          type="submit"
          value="Add Product"
          name="addProd"
        />
        <input
          onclick="clearImages()"
          class="resetButton"
          type="reset"
          value="Clear"
        />
      </div>

      <!-- below is a script to upload and display images on the image panels/div -->
      <script>
        function previewBeforeUpload() {
          document
            .querySelector("#imgFile" )
            .addEventListener("change", function (e) {
              if (e.target.files.length == 0) {
                return 0;
              }
              let file = e.target.files[0];
              let url = URL.createObjectURL(file);
              document.querySelector("#imgFilePanel img").src =
                url;
            });
        }
        previewBeforeUpload();

        // below is function to reset panel images when reset/clear button pressed
        function clearImages() {
          let img = document.querySelector("#imgFilePanel img");
          img.src = "../icons/imagePlaceholder.png";
        }
      </script>
    </form>
  </body>
</html>

