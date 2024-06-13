<?php

session_start();
include("connections.php");
include("functions.php");

// prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


// check if user is logged in
if (!isset($_SESSION['user_id'])) {
  // Redirect to login page
  header("Location: index.php");
  exit();
}


$user_query = "SELECT COUNT(*) AS total_users FROM users";
$user_result = mysqli_query($con, $user_query);
$user_data = mysqli_fetch_assoc($user_result);
$total_users = $user_data['total_users'];

//food in menu                
$menu_query = "SELECT COUNT(*) AS total_foods FROM menu";
$menu_result = mysqli_query($con, $menu_query);
$menu_data = mysqli_fetch_assoc($menu_result);
$total_foods = $menu_data['total_foods'];

// tables available
$reservation_query = "SELECT COUNT(*) AS total_tables FROM tables WHERE status = 'available'";
$reservation_result = mysqli_query($con, $reservation_query);
$reservation_data = mysqli_fetch_assoc($reservation_result);
$total_reservation = $reservation_data['total_tables'];

// pending orders
$order_query = "SELECT COUNT(*) AS total_orders FROM  cart where status = 'pending'";
$order_result = mysqli_query($con, $order_query);
$order_data = mysqli_fetch_assoc($order_result);
$total_order = $order_data['total_orders'];


$tables = $con->query("SELECT * FROM tables");

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
      margin: 0;
      padding: 0;
    }

    .user_data {
      background: url(IMAGES/admin_user_data_logo.jpg);

      background-position-y: 25%;
      background-position-x: 65%;
      box-shadow: 5px 5px .54em rgba(15,
          67,
          126);

      padding: 20px;
      height: 150px;
      width: 270px;
      border-radius: 15px;
      color: white;
      font-size: 1.4rem;
      display: flex;

      justify-content: end;
      align-items: flex-end;
      transition: all 0.6s ease;
    }

    .r {
      display: flex;
      justify-content: center;
      margin: 30px;
    }

    .menu_data {
      background: url(IMAGES/admin_menu_data_logo.jpg);
      transition: all 0.6s ease;
      background-position-y: 29%;
      background-position-x: 135%;
      padding: 20px;
      height: 150px;
      width: 270px;
      border-radius: 15px;
      color: white;
      font-size: 1.4rem;
      display: flex;
      box-shadow: 5px 5px .54em rgba(15,
          67,
          126);
      justify-content: end;
      align-items: flex-end;
    }


    .user_data:hover {
      box-shadow: 5px 5px .54em #000000;
      transform: scale(1.2);
    }

    .menu_data:hover {
      box-shadow: 5px 5px .54em #000000;
      transform: scale(1.2);
    }

    .table_data:hover {
      box-shadow: 5px 5px .54em #000000;
      transform: scale(1.2);
    }

    .order_data:hover {
      box-shadow: 5px 5px .54em #000000;
      transform: scale(1.2);
    }

    .Activity_container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-evenly;
      padding-top: 40px;
      gap: 1em;
    }

    .table_data {
      background: url(IMAGES/set-table.jpg);
      transition: all 0.6s ease;
      background-position-y: 29%;
      background-position-x: 25%;
      padding: 20px;
      height: 150px;
      width: 270px;
      border-radius: 15px;
      color: white;
      font-size: 1.4rem;
      display: flex;
      box-shadow: 5px 5px .54em rgba(15,
          67,
          126);
      justify-content: end;
      align-items: flex-end;
    }

    .order_data {
      background: url(IMAGES/order_logo.jpg);
      transition: all 0.6s ease;
      background-position-y: 29%;
      background-position-x: 25%;
      padding: 20px;
      height: 150px;
      width: 270px;
      border-radius: 15px;
      color: white;
      font-size: 1.4rem;
      display: flex;
      box-shadow: 5px 5px .54em rgba(15,
          67,
          126);
      justify-content: end;
      align-items: flex-end;
    }

    .k {
      margin-top: 25px;
      margin-bottom: 0;
    }

    .d_t {
      padding: 20px 0;
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
        <a href="#" data-content="home">
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
        <a href="admin_settings.php" data-content="settings">
          <i class="bx bx-cog"></i><span class="nav-item">settings</span>
        </a>
        <span class="tooltip2">settings</span>
      </li>


      <li>
        <a href="logout.php" data-content="logout">
          <i class="bx bx-exit"></i><span class="nav-item">logout</span>
        </a>
        <span class="tooltip2">logout</span>
      </li>
    </ul>
  </div>



  <div class="main-content">
    <div class="Activity_container container-fluid">
      <div class="user_data ">
        <p><?php echo $total_users ?> Active users</p>
      </div>
      <div class="menu_data ">
        <p><?php echo $total_foods ?> Menu Items</p>
      </div>
      <div class="table_data ">
        <p><?php echo $total_reservation ?> Tables Available</p>
      </div>
      <div class="order_data ">
        <p> <?php echo $total_order ?> pending orders</p>
      </div>
    </div>


    <div class="r">
      <h3>Recent Orders</h3>
    </div>

    <section class="d_t">

      <table class="table  ">
        <?php

        $select_cart_products = mysqli_query($con, "SELECT * FROM cart");


        if (mysqli_num_rows($select_cart_products) > 0) {

          echo " <thead class='text-center  align-middle'>
<tr>
    <th scope='col'>id</th>
    <th scope='col'>image</th>
    <th scope='col'>Price</th>
    <th scope='col'>name</th>
    <th scope='col'>category</th>
    <th scope='col'>status</th>
    <th scope='col'>user id</th>
    <th scope='col'>Action</th>

</tr>
</thead>
<tbody class='text-center align-middle'>";

          $si_no = 1;

          while ($fetch_cart_products = mysqli_fetch_assoc($select_cart_products)) {
        ?>

            <tr id="cart_item<?php echo $fetch_cart_products['ID']; ?>">
              <th scope="row"><?php echo $si_no++; ?></th>
              <td><img src="IMAGES/<?php echo $fetch_cart_products['image']; ?>" alt="" style="width: 50px;"></td>
              <td><?php echo $fetch_cart_products['price']; ?></td>
              <td><?php echo $fetch_cart_products['name']; ?></td>
              <td><?php echo $fetch_cart_products['category']; ?></td>
              <td class='stst'><?php echo $fetch_cart_products['status']; ?></td>
              <td><?php echo $fetch_cart_products['user_id']; ?></td>

              <td class='ccbutton'>
                <?php
                if ($fetch_cart_products['status'] != 'complete') {
                ?>
                  <button class="btn btn-success" onclick="handleSubmit(<?php echo $fetch_cart_products['price'] . ',' . $fetch_cart_products['ID'] . ',' . $fetch_cart_products['user_id'] ?>)">
                    Confirm
                  </button>
                <?php
                }
                ?>
              </td>


            </tr>

        <?php
          }
        }
        ?>
      </table>
      </table>
      <h1 class="text-center  cactus-classical-serif-regular">All Tables</h1>

      <div class="le">
        <table class="table table-hover k">
          <thead>
            <tr>
              <th>Table Number</th>
              <th>Status</th>
            </tr>
          </thead>
          <?php while ($row = $tables->fetch_assoc()) : ?>
            <tbody>
              <tr>
                <td>Table <?php echo $row['table_number']; ?></td>
                <td><?php echo $row['status']; ?></td>
              </tr>
            </tbody>
          <?php endwhile; ?>
        </table>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


      <!-- Custom JS -->
      <script>
        let btn = document.querySelector("#btn");
        let sidebar1 = document.querySelector(".sidebar1");

        btn.onclick = function() {
          sidebar1.classList.toggle("active");
        };
      </script>
</body>

</html>