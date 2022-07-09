<?php
include('get-product.php');
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
      <h3 class="heading">Product List</h3>
      <div class="button-container">
        <a class="primary-button" href="add-product.php">ADD</a>
        <button type="" form="product_delete_form" id="delete-product-btn" name="prod_delete_multiple_btn" class="primary-button">MASS DELETE</button>
      </div>
    </div>

    <!-- Product List container -->
    <form class="product-block-container" id="product_delete_form" action="delete-product.php" method="post" onSubmit="return delete_confirm();">
      <?php
        foreach ($products as $product) {
      ?>
        <div class="single-product">
          <label class="delete-checkbox-container">
            <input type="checkbox" name="product_delete[]" class="delete-checkbox" value="<?= $product['id'] ?>" />
            <span class="checkmark"></span>
          </label>
          <div class="product-details">
            <span class="product-data"><?= $product['product_code'] ?></span>
            <span class="product-data"><?= $product['name'] ?></span>
            <span class="product-data"><?= $product['price'] ?>$</span>
            <span class="product-data">Size: <?= $product['product_description'] ?></span>
          </div>
        </div>
      <?php
      }
      ?>

    </form>

  </div>
  <footer class="footer-container">
    Scandiweb Test assignment
  </footer>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  function delete_confirm() {
    if ($('.delete-checkbox:checked').length > 0) {
      var result = confirm("Are you sure to delete selected products?");
      if (result) {
        return true;
      } else {
        return false;
      }
    } else {
      alert('Select at least 1 record to delete.');
      return false;
    }
  }
</script>

</html>