<?php

session_start();
include("connections.php");
include("functions.php");

if (isset($_POST['add_product'])) {

  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_description = $_POST['product_description'];
  $product_category = $_POST['product_category'];
  $product_image = $_FILES['product_image']['name'];
  $product_image_temp_name = $_FILES['product_image']['tmp_name'];
  $product_image_folder = 'IMAGES/' . $product_image;

  $insert_query = mysqli_query($con, "insert into `menu` (name,description,price,category,img_url) values('$product_name','$product_description', '$product_price', '$product_category', '$product_image')") or die("insert query failed");

  if ($insert_query) {
    move_uploaded_file($product_image_temp_name, $product_image_folder);
    $display_message = "Product Inserted Successfully";
  } else {
    $display_message = "There are some errors in inserting product";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Testing Admin</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/87a971dd65.js" crossorigin="anonymous"></script>

  <!-- Box icons -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="testing_admin.css" />

  <!-- boostrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background-color: green;
      overflow: hidden;
    }

    .navbar {
      background: rgba(15,
          67,
          126,
          0.445);

      /* White background with 50% opacity */
      backdrop-filter: blur(10px);
    }

    .heading2 {
      display: flex;
      padding-top: 60px;
    }

    .conta {
      margin: auto;
      width: 400px;
      max-width: 90%;
    }

    .conta form {
      width: 100%;
      height: 100%;
      padding: 20px;
      background: rgba(15,
          67,
          126,
          0.445);
      border-radius: 5px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, .3);


    }

    .conta form h3 {
      text-align: center;
      padding-bottom: 15px;
      font-size: 2.2rem;
    }

    /* .input_feild {
      width: 100%;
      height: 40px;
      background-color: white;
      border-radius: 4px;
      margin: 10px 15px;

    } */
    .sept {
      margin: 10px 0;
      /* padding: 20px; */
      display: flex;
      justify-content: start;
      height: 50px;
      width: auto;
      border-radius: 10px;
    }

    .btnq {

      justify-content: center;

    }

    .btn {
      color: white;
      background: linear-gradient(to bottom, #57b0d3, #2a4577, #011c2e);

    }

    .btn:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, .3);
      background: linear-gradient(to top, #57b0d3, #2a4577, #011c2e);
      color: rgb(200, 180, 180)
        /* transform: all 0.5s ease; */
    }

    .d_message {
      display: flex;
      justify-content: center;
      font-size: 1.2rem;
      background-color: #2a4577;
      color: white;
      border-radius: 10px;
    }

    .input_feild {
      width: 100%;
    }
  </style>

</head>

<body>
  <div class="sidebar1">
    <div class="top">
      <div class="logo">
        <i class="bx bx-bowl-rice bx-md"></i><span>RMS</span>
      </div>
      <i class="bx bx-menu bx-md" id="btn"></i>
    </div>
    <div class="user">
      <img src="IMAGES/test1.jpg" alt="" class="user-img" />
      <div>
        <p class="bold">User name</p>
        <p>Admin</p>
      </div>
    </div>
    <ul>
      <li>
        <a href="testing_admin.php">
          <i class="bx bx-home-alt"></i><span class="nav-item">home</span>
        </a>
        <span class="tooltip2">home</span>
      </li>
      <li>
        <a href="admin_user_handling.php">
          <i class="bx bx-user"></i><span class="nav-item">users</span>
        </a>
        <span class="tooltip2">users</span>
      </li>
      <li>
        <a href="admin_settings.php">
          <i class="bx bx-cog"></i><span class="nav-item">settings</span>
        </a>
        <span class="tooltip2">settings</span>
      </li>

      <li>
        <a href="#" data-content="logout">
          <i class="bx bx-exit"></i><span class="nav-item">logout</span>
        </a>
        <span class="tooltip2">logout</span>
      </li>
    </ul>
  </div>

  <div class="main-content">
    <div id=" home" class="content-section">
      <section>
        <?php
        require_once './components/nav_bar.php';
        ?>
      </section>
      <!-- <section> -->
      <!-- <div class="heading1">
        <h3 class="heading2">Add To Menu</h3>
        <form action="" class="add_product boxi">
          <input type="text" placeholder="enter product name" class="input_feild" required>
          <input type="number" min="0" placeholder="enter product price" class="input_feild" required>
          <input type="file" class="input_feild" required>inser
          <input type="submit" class="submit-btn" value="Add Product">
        </form>ff
      </div> -->
      <!-- </section> -->
      <div class="heading2">
        <!-- message display -->



        <div class="conta">
          <div class="d_message">
            <?php
            if (isset($display_message)) {
              echo "<div class='display_message'>
                    <span>" . $display_message . "</span>
                    <i class='fas fa-times' onclick='this.parentElement.style.display=`none`;'></i>
                  </div>";
            }
            ?>
          </div>
          <form action="" class="add_product" method="post" enctype="multipart/form-data">
            <h3>Add To Menu</h3>
            <div class="sept">
              <input type="text" placeholder="enter product name" name="product_name" class="input_feild" required>
            </div>
            <div class="sept">
              <input type="text" placeholder="enter product description" name="product_description" class="input_feild" required>
            </div>
            <div class="sept">
              <input type="text" placeholder="enter product category" name="product_category" class="input_feild" required>
            </div>
            <div class="sept">
              <input type="number" min="0" placeholder="enter product price" name="product_price" class="input_feild" required>
            </div>
            <div class="sept">
              <input type="file" name="product_image" class="input_feild" required accept="image/png, image/jpg, image/jpeg">
            </div>
            <div class="sept btnq">
              <input type="submit" name="add_product" class="submit-btn btn  rounded" value="Add Product">
            </div>
          </form>
        </div>

      </div>


    </div>

    <!-- Custom JS -->
    <script>
      let btn = document.querySelector("#btn");
      let sidebar1 = document.querySelector(".sidebar1");

      btn.onclick = function() {
        sidebar1.classList.toggle("active");
      };
    </script>

    <!-- boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>