<?php
session_start();
include("connections.php");
include("functions.php");

if (isset($_POST['add_to_cart'])) {
  $products_name = $_POST['product_name'];
  $products_price = $_POST['product_price'];
  $products_description = $_POST['product_description'];
  $products_category = $_POST['product_category'];
  $products_image = $_POST['product_image'];
  $products_quantity = 1;
  $user_id = $_SESSION['user_id']; // Get the user ID from the session
  $status = 'pending'; // Set the status to 'pending'

  // Select cart data based on condition
  $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE name='$products_name' AND user_id='$user_id'");
  if (mysqli_num_rows($select_cart) > 0) {
    $display_message[] = "Product already in cart";
  } else {
    // Insert into cart
    $insert_products = mysqli_query($con, "INSERT INTO `cart` (name, price, description, category, image, quantity, user_id, status) VALUES ('$products_name', '$products_price', '$products_description', '$products_category', '$products_image', $products_quantity, '$user_id', '$status')");
    $display_message[] = "Product added to cart";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    .im {
      width: 290px;
      border-radius: 15px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, .5);
    }

    .product_cont {
      display: flex;
      justify-content: center;
      gap: 2em;
      flex-wrap: wrap;
    }
  </style>
  <!-- b -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body>
  <div class="product_cont">
    <?php
    $select_products = mysqli_query($con, "SELECT * FROM `menu`");
    if (mysqli_num_rows($select_products) > 0) {
      while ($fetch_product = mysqli_fetch_assoc($select_products)) {
    ?>
        <form action="" method="post">
          <div class="edit_form">
            <img class="im" src="IMAGES/<?php echo $fetch_product['img_url']; ?>" alt="">
            <h3 class="text-center"><?php echo $fetch_product['name']; ?></h3>
            <div class="price text-center"><?php echo $fetch_product['price']; ?></div>
            <div class="text-center">
              <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
              <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
              <input type="hidden" name="product_description" value="<?php echo $fetch_product['description']; ?>">
              <input type="hidden" name="product_category" value="<?php echo $fetch_product['category']; ?>">
              <input type="hidden" name="product_image" value="<?php echo $fetch_product['img_url']; ?>">
              <button class="btn btn-primary" name="add_to_cart">Add to Cart</button>
            </div>
          </div>
        </form>
    <?php
      }
    } else {
      echo "<p class='text-center'>No products available</p>";
    }
    ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>