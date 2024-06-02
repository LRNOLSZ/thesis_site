<?php

session_start();
include("connections.php");
include("functions.php");
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
  <link rel="stylesheet" href="styles_folder/admin_user_handling.css">
</head>
<style>
  .header {
    color: red;
  }
</style>

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
    <div id="home" class="content-section">
      <h1 class="header">User handling</h1>
      <p>Welcome to the user handling</p>

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