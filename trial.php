<?php
session_start();
include("connections.php");
include("functions.php");

// Fetch menu items from the database
$sql = "SELECT * FROM menu";
$result = mysqli_query($con, $sql);

?>
<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Bootstrap -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

  <link rel="stylesheet" href="styles_folder/user.css" />
</head>

<body>

  <div class="container">
    <div class="row">
      <?php
      if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <div class="col-lg-3 col-md-6 col-sm-6 beverage_row" id="num1">
            <div class="card">
              <img src="<?php echo $row['img_url']; ?>" class="card-img-top rounded bo-img" alt="<?php echo $row['name']; ?>">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                <p class="card-text"><?php echo $row['description']; ?></p>
                <p class="card-text">Price: <?php echo $row['price']; ?></p>
                <button class="btn cart_btn">Add to cart</button>
              </div>
            </div>
          </div>
      <?php
        }
      } else {
        echo "0 results";
      }

      // Close connection
      mysqli_close($con);
      ?>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
  </script>
</body>

</html>