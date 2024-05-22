<?php
session_start();

// Check if the user is logged in, if not redirect to login page
// if (!isset($_SESSION['user_id'])) {
//   header("Location: index.php");
//   exit();
// }

// Include your database connection file
include("connections.php");

// Check if the form is submitted
if (isset($_POST['submit'])) {
  // Validate input (e.g., current password, new password, confirm password)
  $currentPassword = $_POST['current_password'];
  $newPassword = $_POST['new_password'];
  $confirmPassword = $_POST['confirm_password'];

  // Check if the current password matches the one in the database
  $userId = $_SESSION['user_id'];
  $sql = "SELECT password FROM users WHERE user_id = $userId";
  $result = mysqli_query($con, $sql);

  if ($result) {
    $row = mysqli_fetch_assoc($result);
    $storedPassword = $row['password'];

    if (password_verify($currentPassword, $storedPassword)) {
      // Current password is correct, proceed with password change

      if ($newPassword === $confirmPassword) {
        // New password and confirm password match, proceed with update

        // Hash the new password
        $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the password in the database
        $updateSql = "UPDATE users SET password = '$hashedNewPassword' WHERE user_id = $userId";
        $updateResult = mysqli_query($con, $updateSql);

        if ($updateResult) {
          // Password changed successfully
          $successMessage = "Password changed successfully.";
        } else {
          // Error updating password
          $errorMessage = "Error updating password.";
        }
      } else {
        // New password and confirm password do not match
        $errorMessage = "New password and confirm password do not match.";
      }
    } else {
      // Current password is incorrect
      $errorMessage = "Current password is incorrect.";
    }
  } else {
    // Error querying the database
    $errorMessage = "Error querying the database.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>
  <script>
    function openLoginPage() {
      // Redirect to index.php
      window.location.href = "index.php";
    }
  </script>

  <style>
    .login-box {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 400px;
      padding: 40px;
      transform: translate(-50%, -50%);
      background: rgba(0, 0, 0, 0.5);
      box-sizing: border-box;
      box-shadow: 0 15px 25px rgba(0, 0, 0, 0.6);
      border-radius: 10px;
    }

    .login-box h2 {
      margin: 0 0 30px;
      padding: 0;
      color: #fff;
      text-align: center;
    }

    .login-box .user-box {
      position: relative;
    }

    .login-box .user-box input {
      width: 100%;
      padding: 10px 0;
      font-size: 16px;
      color: #fff;
      margin-bottom: 30px;
      border: none;
      border-bottom: 1px solid #fff;
      outline: none;
      background: transparent;
    }

    .login-box .user-box label {
      position: absolute;
      top: 0;
      left: 0;
      padding: 10px 0;
      font-size: 16px;
      color: #fff;
      pointer-events: none;
      transition: 0.5s;
    }

    .login-box .user-box input:focus~label,
    .login-box .user-box input:valid~label {
      top: -20px;
      left: 0;
      color: #03e9f4;
      font-size: 12px;
    }

    .butons {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .login-button {
      position: relative;
      display: inline-block;
      padding: 10px 20px;
      color: #03e9f4;
      font-size: 16px;
      text-decoration: none;
      text-transform: uppercase;
      overflow: hidden;
      transition: 0.5s;
      margin-top: 40px;
      letter-spacing: 4px;
      border: none;
      background: transparent;
      cursor: pointer;
    }

    .login-button:hover {
      background: #03e9f4;
      color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 5px #03e9f4, 0 0 25px #03e9f4, 0 0 50px #03e9f4,
        0 0 100px #03e9f4;
    }

    .login-button span {
      position: absolute;
      display: block;
    }

    .login-button span:nth-child(1) {
      top: 0;
      left: -100%;
      width: 100%;
      height: 2px;
      background: linear-gradient(90deg, transparent, #03e9f4);
      animation: btn-anim1 1s linear infinite;
    }

    @keyframes btn-anim1 {
      0% {
        left: -100%;
      }

      50%,
      100% {
        left: 100%;
      }
    }

    .login-button span:nth-child(2) {
      top: -100%;
      right: 0;
      width: 2px;
      height: 100%;
      background: linear-gradient(180deg, transparent, #03e9f4);
      animation: btn-anim2 1s linear infinite;
      animation-delay: 0.25s;
    }

    @keyframes btn-anim2 {
      0% {
        top: -100%;
      }

      50%,
      100% {
        top: 100%;
      }
    }

    .login-button span:nth-child(3) {
      bottom: 0;
      right: -100%;

      width: 100%;
      height: 2px;
      background: linear-gradient(270deg, transparent, #03e9f4);
      animation: btn-anim3 1s linear infinite;
      animation-delay: 0.5s;
    }

    @keyframes btn-anim3 {
      0% {
        right: -100%;
      }

      50%,
      100% {
        right: 100%;
      }
    }

    .login-button span:nth-child(4) {
      bottom: -100%;
      left: 0;
      width: 2px;
      height: 100%;
      background: linear-gradient(360deg, transparent, #03e9f4);
      animation: btn-anim4 1s linear infinite;
      animation-delay: 0.75s;
    }

    @keyframes btn-anim4 {
      0% {
        bottom: -100%;
      }

      50%,
      100% {
        bottom: 100%;
      }
    }

    .error-message {
      color: red;
      font-size: 1.2rem;
      margin-top: 30px;
      display: flex;
      justify-content: center;
    }

    @media (max-width: 1362px) and (min-height: 600px) {
      .image-box img {
        width: unset;
        height: 100vh;
      }

      .image-box {
        display: flex;
        justify-content: center;
      }
    }

    @media (max-width: 480px) {
      .login-box {
        width: 250px;
      }

      .butons {
        justify-content: center;
      }
    }

    .image-box {
      position: fixed;
      top: 0px;
      left: 0px;
      width: 100%;
      overflow: hidden;
      height: 100vh;
    }

    .image-box img {
      width: 100vw;
      height: unset;
      transition: transform 0.2s ease;
    }

    /* input section */
    html {
      height: 100%;
    }
  </style>
</head>

<body>

  <div class="image-box">
    <img src="IMAGES/bg1.jpg" id="home_page_bg" class="" alt="" />
  </div>
  <div class="login-box">
    <h2>Change Password</h2>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="user-box">
        <input type="password" id="current_password" name="current_password" required>
        <label for="current_password">Current Password:</label>
      </div>
      <div class="user-box">
        <input type="password" id="new_password" name="new_password" required>
        <label for="new_password">New Password:</label>
      </div>
      <div class="user-box">
        <input type="password" id="confirm_password" name="confirm_password" required>
        <label for="confirm_password">Confirm New Password:</label>
      </div>
      <div class="butons">
        <button class="login-button" type="submit" name="submit"><span></span>
          <span></span>
          <span></span>
          <span></span>Change Password</button>
        <button class="login-button" onclick="openLoginPage()">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Sign in
        </button>
      </div>
    </form>
    <?php if (isset($successMessage)) : ?>
      <p style="color: green;"><?php echo $successMessage; ?></p>
    <?php endif; ?>
    <?php if (isset($errorMessage)) : ?>
      <p class="error-message"><?php echo $errorMessage; ?></p>
    <?php endif; ?>
  </div>
</body>

</html>