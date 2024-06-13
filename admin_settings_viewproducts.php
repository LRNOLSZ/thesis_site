<?php
session_start();
include("connections.php");
include("functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Product</title>
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
    .navbar {
      background: rgba(15, 67, 126, 0.445);
    }

    .sec {
      margin: 20px 30px;
    }

    .delete_product_btn {
      margin-right: 10px;
    }

    .picc {
      width: 90px;

    }

    .d_message {
      display: flex;
      justify-content: center;
      font-size: 1.2rem;
      background-color: #2a4577;
      color: white;
      border-radius: 10px;
    }

    .table>tbody {
      vertical-align: middle;
    }
  </style>
</head>

<body>
<?php
        require_once './components/nav_bar.php';
        ?>


  <div>
    <div class="sec">
      <table class="table">


        <?php
        $display_product = mysqli_query($con, "Select * from `menu`");
        $num = 1;
        if (mysqli_num_rows($display_product) > 0) {
          echo '<thead class=" table-secondary">
                <tr>
                  <th scope="col" class="text-center">SI No</th>
                  <th scope="col" class="text-center">Product Image</th>
                  <th scope="col" class="text-center">Product Name</th>
                  <th scope="col" class="text-center">Product Price</th>
                  <th scope="col" class="text-center">Product description</th>
                  <th scope="col" class="text-center">Product category</th>
                  <th scope="col" class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>';

          while ($row = mysqli_fetch_assoc($display_product)) {
        ?>
            <!-- display table -->

            <tr>
              <th class="text-center" scope="row"><?php echo $num ?></th>
              <td class="text-center"><img src="IMAGES/<?php echo $row['img_url'] ?>" class="picc" alt=""></td>
              <td class="text-center"><?php echo $row['name'] ?></td>
              <td class="text-center"><?php echo $row['price'] ?></td>
              <td class="text-center"><?php echo $row['description'] ?></td>
              <td class="text-center"><?php echo $row['category'] ?></td>
              <td class="text-center">
                <a href="admin_settings_product_delete.php?delete=<?php echo $row['ID'] ?>" class="delete_product_btn" onclick="return confirm('Are you sure you want to delete this product');"><i class="fas fa-trash"></i></a>
                <a href="admin_settings_product_update.php?edit=<?php echo $row['ID'] ?>" class="update_product_btn">
                  <i class="fas fa-edit"></i></a>
              </td>
            </tr>

        <?php
            $num++;
          }
        } else {
          echo "<div class='d_message'>No Products available</div>";
        }


        ?>

        </tbody>

      </table>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>