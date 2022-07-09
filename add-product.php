<?php 
if( isset($_SESSION['Error']) ){
  echo $_SESSION['Error'];
  unset($_SESSION['Error']);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product - List</title>
    <link href="css/products.css" rel="stylesheet" />
  </head>
  <body>
    <div class="main-container">
      <div class="head-block">
        <h3 class="heading">Add Product</h3>
        <div class="button-container">
          <button type="submit" form="product_form" id="add-product" class="primary-button">
            SAVE
          </button>
          <a href="product.php" class="primary-button"> CANCEL </a>
        </div>
      </div>

      <div class="product-block-container">
        <form id="product_form" method="POST" action="create.php">
          <div class="each-field">
            <label for="sku">SKU</label>
            <input type="text" value="" name="code" placeholder="SKU" />
            <span class="error-span code-error">Product SKU is required</span>
          </div>

          <div class="each-field">
            <label>Name</label>
            <input type="text" value="" name="name" placeholder="Name" />
            <span class="error-span name-error">Product name is required</span>
          </div>

          <div class="each-field">
            <label>Price($)</label>
            <input type="number" name="price" placeholder="Price" />
            <span class="error-span price-error"
              >Product price is required</span
            >
          </div>

          <div class="product-type-block">
            <label>Type Switcher</label>
            <select id="product_type" name="product-type">
              <option value="">Type Switcher</option>
              <option value="dvd">DVD</option>
              <option value="book">Book</option>
              <option value="furniture">Furniture</option>
            </select>
            <img class="chev-down" src="images/down-chev.svg" />
            <span class="error-span product-type-error">Product type is required</span>
          </div>

          <div class="dynamic-form" id="dvd">
            <div class="each-field">
              <label>Size(MB)</label>
              <input type="number" id="size" name="size" placeholder="Size" />
              <span class="error-span size-error">Please provide dvd size</span>
            </div>
          </div>

          <div class="dynamic-form" id="furniture">
            <div class="each-field">
              <label>Height (CM)</label>
              <input type="number" id="height" name="height" placeholder="Height" />
              <span class="error-span height-error">Please furniture height</span>
            </div>
            <div class="each-field">
              <label>Width (CM)</label>
              <input type="number" id="width" name="width" placeholder="Width" />
              <span class="error-span width-error">Please furniture width</span>
            </div>
            <div class="each-field">
              <label>Length (CM)</label>
              <input type="number" id="length" name="length" placeholder="Length" />
              <span class="error-span length-error">Please furniture length</span>
            </div>
          </div>

          <div class="dynamic-form" id="book">
            <div class="each-field">
              <label>Weight(KG)</label>
              <input type="number" id="weight" name="weight" placeholder="Weight" />
              <span class="error-span weight-error">Please provide book weight</span>

            </div>
          </div>
        </form>
      </div>
    </div>

    <footer class="footer-container">Scandiweb Test assignment</footer>
  </body>

  <script>
    var dynamicForms = document.getElementsByClassName("dynamic-form");
    document.getElementById("product_type").addEventListener("change", showDynamicForm);
    var errorMessages = document.querySelectorAll('.error-span');

    errorMessages.forEach(error => {
      if(error.classList.contains('show')){
        error.classList.remove('show');
      }
    });

    // Switch dynamic form
    function showDynamicForm() {
      for (el of dynamicForms) {
        el.classList.remove("show");
      }
      if (this.value === "") return;
      document.getElementById(this.value).classList.add("show");
    }

    document.getElementById("product_form").addEventListener("submit", submitProduct);
    function submitProduct(event) {
      var errors = [];

      var sku = this.elements["code"];
      var name = this.elements["name"];
      var price = this.elements["price"];
      var product_type = this.elements['product-type'];
      var size = this.elements['size'];
      var height = this.elements['height'];
      var width = this.elements['width'];
      var weight = this.elements['weight'];
      var length = this.elements['length'];

      if (sku.value === "") {
        document.querySelector(".code-error").classList.add("show");
        errors.push('Please provide SKU');
      }

      if (name.value === "") {
        document.querySelector(".name-error").classList.add("show");
        errors.push('Please provide the name');
      }

      if (price.value === "") {
        document.querySelector(".price-error").classList.add("show");
        errors.push('Please provide product price');
      }

      if (product_type.value === "") {
        document.querySelector(".product-type-error").classList.add("show");
        errors.push('Please select product type');
      }

      if(product_type.value === "dvd" && size.value === "") {
        document.querySelector(".size-error").classList.add("show");
        errors.push('Please provide dvd size');
      }

      if(product_type.value === "book" && weight.value === "") {
        document.querySelector(".weight-error").classList.add("show");
        errors.push('Please provide book weight');
      }

      if(product_type.value === "furniture" && height.value === "") {
        document.querySelector(".height-error").classList.add("show");
        errors.push('Please provide furniture height');
      }

      if(product_type.value === "furniture" && width.value === "") {
        document.querySelector(".width-error").classList.add("show");
        errors.push('Please provide furniture width');
      }

      if(product_type.value === "furniture" && length.value === "") {
        document.querySelector(".length-error").classList.add("show");
        errors.push('Please provide furniture length');
      }

      if (errors.length > 0) {
        event.preventDefault();
        return;
      }

    }
  </script>
</html>
