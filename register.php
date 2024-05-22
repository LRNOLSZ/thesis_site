<?php
session_start();
include("connections.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  // Something was posted
  $user_name = $_POST['user_name'];
  $password = $_POST['password'];

  if (!empty($user_name) && !empty($password)) {
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Save to database
    $user_id = random_num(20);
    $query = "INSERT INTO users (user_id, user_name, password) VALUES ('$user_id', '$user_name', '$hashed_password')";

    if (mysqli_query($con, $query)) {
      // Redirect to login page after successful registration
      header("Location: index.php");
      exit;
    } else {
      echo "Error: " . $query . "<br>" . mysqli_error($con);
    }
  } else {
    echo "Please enter both username and password.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>register</title>

  <!--css-->
  <link rel="stylesheet" href="styles_folder/STYLE.CSS" />

  <!--BOOSTRAP-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <script>
    function openloginPage() {
      // Redirect to index.php
      window.location.href = "index.php";
    }
  </script>
</head>

<body>
  <div class="image-box">
    <img src="IMAGES/bg1.jpg" id="home_page_bg" class="" alt="" />
  </div>

  <!-- text area -->
  <section id="credentials">
    <div class="login-box">
      <h2>Register</h2>
      <form method="POST">
        <div class="user-box">
          <input type="text" name="user_name" required="">
          <label>Username</label>
        </div>
        <div class="user-box">
          <input type="password" name="password" required="">
          <label>Password</label>
        </div>
        <div class="butons">

          <button class="register-button login-button">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            register
          </button>
          <button class="login-button" onclick="openloginPage()">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Sign in
          </button>
        </div>
      </form>
    </div>


  </section>

  <!--BOOSTRAP CDN-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
  </script>
</body>

</html>