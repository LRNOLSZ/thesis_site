<?php
session_start();
include("connections.php");
include("functions.php");

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate the input fields
  $currentPassword = $_POST['current_password'];
  $newPassword = $_POST['new_password'];
  $confirmNewPassword = $_POST['confirm_new_password'];

  $userId = $_SESSION['user_id'];
    $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET password = '$hashedNewPassword' WHERE id = $user_id";
    mysqli_query($con, $sql);
    echo "Password changed successfully.";


    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cange password</title>

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

    <!-- fonts -->
    <!-- montserat -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
    <!-- open sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet" />
    <!-- souce code pro font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet" />
    <!-- NOTO SERIF FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />

    <!-- fa icons -->
    <script src="https://kit.fontawesome.com/87a971dd65.js" crossorigin="anonymous"></script>

    <style>

    </style>
</head>

<body>

    <!-- <h2>Change Password</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="current-password">Current Password:</label>
    <input type="password" id="current-password" name="current_password" required><br>

    <label for="new-password">New Password:</label>
    <input type="password" id="new-password" name="new_password" required><br>

    <label for="confirm-new-password">Confirm New Password:</label>
    <input type="password" id="confirm-new-password" name="confirm_new_password" required><br>

    <button type="submit">Change Password</button>
  </form> -->


    <div class="login-box">
        <h2>Change Password</h2>
        <form method="POST" action="">
            <div class="user-box">
                <input type="password" id="current-password" name="current_password" required="">
                <label for="current-password">Current Password:</label>
            </div>
            <div class="user-box">
                <input type="password" id="new-password" name="new_password" required>
                <label for="new-password">New Password:</label>
            </div>
            <div class="user-box">
                <input type="password" id="confirm-new-password" name="confirm_new_password" required>
                <label for="confirm-new-password">Confirm New Password:</label>

            </div>
            <div class="butons">
                <button class="login-button" type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Change password
                </button>
                <!-- <button class="register-button login-button" onclick="openRegisterPage()">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Register
                </button> -->
            </div>
        </form>
        <?php if (isset($error_message)) : ?>
        <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
    </div>
    <!-- </section>-->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>