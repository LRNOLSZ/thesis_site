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



// Handle form submission to set the number of tables
if (isset($_POST['set_tables'])) {
  $num_tables = intval($_POST['num_tables']);

  // Clear existing tables
  $con->query("TRUNCATE TABLE tables");

  // Insert new tables
  for ($i = 1; $i <= $num_tables; $i++) {
    $con->query("INSERT INTO tables (table_number) VALUES ($i)");
  }
}

// Handle form submission to update table status
if (isset($_POST['update_status'])) {
  $table_id = intval($_POST['table_id']);
  $status = $_POST['status'];

  $con->query("UPDATE tables SET status='$status' WHERE id=$table_id");
}

// Fetch all tables
$tables = $con->query("SELECT * FROM tables");
?>

<!DOCTYPE html>
<html>

<head>
  <title>Restaurant Tables Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- faicons -->
  <script src="https://kit.fontawesome.com/87a971dd65.js" crossorigin="anonymous"></script>
  <!-- boxicons -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />



  <style>
    body {
      margin: 0;
      background: url(IMAGES/jk.jpg);
      background-size: cover;
      /* Ensures the background image covers the entire page */
      background-repeat: no-repeat;
      background-attachment: fixed;
    }

    .data {
      padding: 15px 15px;
    }


    .hea {
      display: flex;
      justify-content: center;
      margin: 20px 0;
    }

    .le {
      padding: 0 80px;
    }

    .cactus-classical-serif-regular {
      font-family: "Cactus Classical Serif", serif;
      font-weight: 400;
      font-style: normal;
      /* color: white; */
    }
    .navbar {
      background-color:#91B7D9;
    }
    
  </style>
</head>

<body>
  <section id="navbar3">
    <nav class=" cd navbar navbar-expand-lg ">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="bx bx-bowl-rice bx-md"></i><span>RMS</span>
        </a>
        <button class=" ms-auto navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="   collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="cashier.php" alt="home" ><i class="fa fa-home" aria-hidden="true"></i></a>
            </li>


            <li class="nav-item">
              <a class="nav-link " href="tablessetting.php"><i class="fa fa-table" aria-hidden="true"></i>
              TABLES</a>
            </li>
          </ul>

        </div>
      </div>
    </nav>
  </section>


  <section class="data">
    <div class="hea">
      <h1 class="cactus-classical-serif-regular">Set Number of Tables</h1>
    </div>
    <div class="hea">
      <form method="post">
        <input type="number" min="1" name="num_tables" required>
        <input type="submit" name="set_tables" value="Set Tables" class="btn btn-primary">
      </form>
    </div>
    <div class="hea">
      <h1 class="cactus-classical-serif-regular">Update Table Status</h1>
    </div>
    <div class="hea">
      <form method="post">
        <select name="table_id" required>
          <?php
          // Fetch tables again for the dropdown
          $tables_for_dropdown = $con->query("SELECT * FROM tables");
          while ($row = $tables_for_dropdown->fetch_assoc()) :
          ?>
            <option value="<?php echo $row['id']; ?>">
              Table <?php echo $row['table_number']; ?> - <?php echo $row['status']; ?>
            </option>
          <?php endwhile; ?>
        </select>

        <select name="status" required>
          <option value="available">Available</option>
          <option value="occupied">Occupied</option>
        </select>
        <input type="submit" name="update_status" value="Update Status" class="btn btn-primary">
      </form>
    </div>
    <h1 class="text-center  cactus-classical-serif-regular">All Tables</h1>

    <div class="le">
      <table class="table table-hover">
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
  </section>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>