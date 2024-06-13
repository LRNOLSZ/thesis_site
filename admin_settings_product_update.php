<?php
session_start();
include("connections.php");
include("functions.php");

//update logic 
if (isset($_POST['update_product'])) {
  $update_product_ID = $_POST['update_product_ID'];
  $update_product_name = $_POST['update_product_name'];
  echo $update_product_name;
  $update_product_category = $_POST['update_product_category'];
  $update_product_price = $_POST['update_product_price'];
  $update_product_description = $_POST['update_product_description'];
  $update_product_image = $_FILES['update_product_image']['name'];
  $update_product_image_tmp_name = $_FILES['update_product_image']['tmp_name'];
  $update_product_image_folder = 'IMAGES/' . $update_product_image;

  //update query 
  $update_product = mysqli_query($con, "Update menu set name= '$update_product_name', price='$update_product_price', description='$update_product_description', category='$update_product_category', img_url='$update_product_image' where ID=$update_product_ID ");

  if ($update_product) {
    move_uploaded_file($update_product_image_tmp_name, $update_product_image_folder);
    header('location:admin_settings_viewproducts.php');
  } else {
    $display_message = "There are some errors in updating product";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Product</title>
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/87a971dd65.js" crossorigin="anonymous"></script>

  <!-- Box icons -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
    html,
    body {
      height: 100%;
      margin: 0;
    }

    body {
      display: flex;
      flex-direction: column;
    }

    .navbar {
      background: rgba(15, 67, 126, 0.445);
    }

    .hoo {
      display: flex;
      justify-content: center;
      height: 100%;
      align-items: center;
    }

    .bigger_version {
      height: 410px;
      width: 400px;
      background: rgba(15, 67, 126, 0.445);
      padding-top: 60px;
    }

    .area_a {
      display: flex;
      justify-content: center;
      margin-top: 10px;
      padding: 0 15px;
    }

    .i_take {
      width: 100%;
    }

    .im_g {
      width: 90px;
    }

    .im_g_holder {
      display: flex;
      justify-content: center;
    }

    .d_message {
      display: flex;
      justify-content: center;
      font-size: 1.2rem;
      background-color: #2a4577;
      color: white;
      border-radius: 10px;
    }
  </style>
</head>

<body>
<?php
        require_once './components/nav_bar.php';
        ?>

  <div class="hoo">
    <div class="bigger_version rounded">

      <?php
      if (isset($_GET['edit'])) {
        $edit_id = $_GET['edit'];
        $edit_query = mysqli_query($con, "SELECT * from menu where ID= $edit_id ");
        if (mysqli_num_rows($edit_query) > 0) {
          $fetch_data = mysqli_fetch_assoc($edit_query);
      ?>
          <?php if (isset($display_message)) { ?>
            <div class="d_message">
              <div class="display_message">
                <span><?php echo $display_message; ?></span>
                <i class="fas fa-times" onclick="this.parentElement.style.display='none';"></i>
              </div>
            </div>
          <?php } ?>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="im_g_holder">
              <img class="im_g" src="IMAGES/<?php echo $fetch_data['img_url'] ?>" alt="">
            </div>
            <div class="area_a"> <input type="hidden" class="i_take" value="<?php echo $fetch_data['ID'] ?>" name="update_product_ID"></div>
            <div class="area_a"> <input type="text" class="i_take" value="<?php echo $fetch_data['name'] ?>" name="update_product_name" required></div>
            <div class="area_a"> <input type="text" class="i_take" value="<?php echo $fetch_data['description'] ?>" name="update_product_description" required></div>
            <div class="area_a"> <input type="text" class="i_take" value="<?php echo $fetch_data['category'] ?>" name="update_product_category" required></div>
            <div class="area_a"> <input type="number" min="1" class="i_take" value="<?php echo $fetch_data['price'] ?>" name="update_product_price" required></div>
            <div class="area_a"> <input type="file" class="i_take" name="update_product_image" required accept="image/png, image/jpg, image/jpeg"></div>
            <div class="area_a gap-1"> <button class="i_take rounded btn btn-primary" type="submit" name="update_product">Update</button><button class="i_take rounded btn btn-danger">Cancel</button></div>
          </form>
      <?php
        }
      }
      ?>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>