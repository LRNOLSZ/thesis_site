<?php

session_start();
include("connections.php");
include("functions.php");


$user_query = "SELECT COUNT(*) AS total_users FROM users";
$user_result = mysqli_query($con, $user_query);
$user_data = mysqli_fetch_assoc($user_result);
$total_users = $user_data['total_users'];

//food in menu                
$menu_query = "SELECT COUNT(*) AS total_foods FROM menu";
$menu_result = mysqli_query($con, $menu_query);
$menu_data = mysqli_fetch_assoc($menu_result);
$total_foods = $menu_data['total_foods'];

// echo $total_foods
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
  <style>
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
        <a href="#" data-content="orders">
          <i class="bx bx-food-menu"></i><span class="nav-item">orders</span>
        </a>
        <span class="tooltip2">orders</span>
      </li>
      <li>
        <a href="#" data-content="contacts">
          <i class="bx bx-headphone"></i><span class="nav-item">contacts</span>
        </a>
        <span class="tooltip2">contacts</span>
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
    <div class="Activity_container container-fluid">
      <div class="user_data ">
        <p><?php echo $total_users ?> Active users</p>
      </div>
      <div class="menu_data ">
        <p><?php echo $total_foods ?> Menu Items</p>
      </div>
      <div class="table_data ">
        <p> 10 Tables Available</p>
      </div>
      <div class="order_data ">
        <p> Orders</p>
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
</body>

</html>