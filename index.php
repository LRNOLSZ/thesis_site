<?php
session_start();
include("connections.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // Something was posted
  $user_name = $_POST['username'];
  $password = $_POST['password'];

  if (!empty($user_name) && !empty($password)) {
    // Read from database
    $query = "SELECT * FROM users WHERE BINARY user_name = '$user_name' LIMIT 1";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      $user_data = mysqli_fetch_assoc($result);
      $storedHashedPassword = $user_data['password'];
      if (password_verify($password, $storedHashedPassword)) {
        // Password is correct, proceed with login
        $_SESSION['user_id'] = $user_data['ID'];
        // var_dump($_SESSION);
        // die();
        if ($user_data['role'] === 'admin') {
          header("Location: testing_admin.php");
        } else {
          header("Location: user.php");
        }
        die;
      } else {
        // Password is incorrect
        $error_message = "Invalid password";
      }
    } else {
      // Username not found in database
      $error_message = "Invalid username";
    }
  } else {
    $error_message = "Please enter username and password";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>

  <!-- CSS -->
  <link rel="stylesheet" href="styles_folder/STYLE.CSS" />

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

  <script>
    function openRegisterPage() {
      // Redirect to register.php
      window.location.href = "register.php";
    }
  </script>

  <style>
    .error-message {
      color: red;
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <div class="image-box">
    <img src="IMAGES/bg1.jpg" id="home_page_bg" class="" alt="" />
  </div>

  <!-- text area -->
  <!-- <section id="credentials"> -->
  <div class="login-box">
    <h2>Login</h2>
    <form method="POST" action="">
      <div class="user-box">
        <input type="text" name="username" required="">
        <label>Username</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required="">
        <label>Password</label>
      </div>
      <div class="butons">
        <button class="login-button">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Sign in
        </button>
        <button class="register-button login-button" onclick="openRegisterPage()">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Register
        </button>
      </div>
    </form>
    <?php if (isset($error_message)) : ?>
      <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>
  </div>
  <!-- </section> -->

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
  </script>
</body>

</html>