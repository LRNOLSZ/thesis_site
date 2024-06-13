<?php

session_start();
include("connections.php");
include("functions.php");




// prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


if (!isset($_SESSION['user_id'])) {
  // Redirect to login page
  header("Location: index.php");
  exit();
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
  <link rel="stylesheet" href="styles_folder/admin_user_handling.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
  .header {
    color: red;
  }

  .tb {
    display: flex;
    justify-content: center;
    padding: 0 30px;
  }

  .fas {
    margin: 0 15px;
  }

  .rou {
    border-radius: 15px;
  }


  @media screen and (max-width:500px) {
    .sm1 {
      display: none;
    }
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
        <a href="logout.php" data-content="logout">
          <i class="bx bx-exit"></i><span class="nav-item">logout</span>
        </a>
        <span class="tooltip2">logout</span>
      </li>
    </ul>
  </div>

  <div class="main-content">
    <div id="home" class="content-section">
      <div class="tb">
        <h1 class="header">User handling</h1>
      </div>
      <div class="tb">
        <table class="table  rou">
          <?php

          $select_cart_products = mysqli_query($con, "SELECT * FROM users");


          if (mysqli_num_rows($select_cart_products) > 0) {


            echo "<thead>
  <tr>
    <th class='text-center  sm1' scope='col'>ID</th>
    <th class='text-center' scope='col'>Username</th>
    <th class='text-center' scope='col'>Role</th>
    <th class='text-center  sm1' scope='col'>Action</th>

  </tr>
</thead>
<tbody  class='text-center align-middle' >";


            $si_no = 1;

            while ($fetch_cart_products = mysqli_fetch_assoc($select_cart_products)) {
          ?>


              <tr>
                <th class="text-center sm1" scope="row"><?php echo $fetch_cart_products['ID']; ?></th>
                <th class="text-center" scope="row"><?php echo $fetch_cart_products['user_name']; ?></th>
                <td class="text-center" class="text-center">
                  <span id="role_<?php echo $fetch_cart_products['ID']; ?>"><?php echo $fetch_cart_products['role']; ?></span>
                  <select onchange="handelChange(this.value,<?php echo $fetch_cart_products['ID']; ?>)" name="" id="">
                    <option value="" selected disabled hidden></option>
                    <option value="admin">admin</option>
                    <option value="user">user</option>
                    <option value="cashier">cashier</option>

                  </select>
                </td>
                <!-- <td class="text-center  sm1"></i><i class="fas fa-trash"></i></td> -->
                <td>
                  <i class="fas fa-trash delete-icon" data-id="<?php echo $fetch_cart_products['ID']; ?>"></i>
                </td>




              </tr>
          <?php
            }
          }

          ?>
          </tbody>
        </table>
      </div>

    </div>

    <!-- Custom JS -->
    <script>
      let btn = document.querySelector("#btn");
      let sidebar1 = document.querySelector(".sidebar1");

      btn.onclick = function() {
        sidebar1.classList.toggle("active");
      };

      const handelChange = async (e, q) => {
        console.log(e + q)
        let body = new FormData();
        body.append("role", e);
        body.append("user_id", q);

        let response = await fetch("./api/change_user_premission.php", {
          method: "POST",
          body,
        });
        let data = await response.json();
        if (data.status == 'success') {
          document.querySelector("#role_" + q).innerHTML = e
        } else {
          window.alert(data.message)
        }
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script>
      document.addEventListener('DOMContentLoaded', (event) => {
        const deleteIcons = document.querySelectorAll('.delete-icon');

        deleteIcons.forEach(icon => {
          icon.addEventListener('click', async (e) => {
            const userId = e.target.getAttribute('data-id');
            if (confirm('Are you sure you want to delete this user?')) {
              try {
                const response = await fetch('delete_user.php', {
                  method: 'POST',
                  headers: {
                    'Content-Type': 'application/json'
                  },
                  body: JSON.stringify({
                    user_id: userId
                  })
                });
                const result = await response.json();
                if (result.status === 'success') {
                  e.target.closest('tr').remove();
                  alert('User deleted successfully.');
                } else {
                  alert('Failed to delete user: ' + result.message);
                }
              } catch (error) {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
              }
            }
          });
        });
      });
    </script>

</body>

</html>