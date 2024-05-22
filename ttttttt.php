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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>user</title>

  <!-- Bootstrap -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

  <!-- fonts -->
  <!-- montserat -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
  <!-- open sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet" />
  <!-- souce code pro font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet" />
  <!-- NOTO SERIF FONT -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />

  <!-- fa icons -->
  <script src="https://kit.fontawesome.com/87a971dd65.js" crossorigin="anonymous"></script>

  <!-- css -->
  <link rel="stylesheet" href="styles_folder/tttttt.css" />
</head>

<body>
  <!-- navbar  -->
  <section>
    <nav class="navbar navbar-expand-lg ">
      <div class="container-fluid">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <button class="navbar-toggler mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse collapse_border" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center">
            <!-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"></a>
                        </li> -->
            <li class="nav-item li_bor ">
              <a class="nav-link active" href="#beverages">Beverages</a>
            </li>
            <li class="nav-item li_bor ">
              <a class="nav-link active" href="#desert">Desert</a>
            </li>
            <li class="nav-item li_bor ">
              <a class="nav-link active" href="#testimonial">Testimonial</a>
            </li>
            <li class="nav-item li_bor ">
              <a class="nav-link active" href="#contacts">Contacts</a>
            </li>
          </ul>
          <!-- nav en -->
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ending_nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="#"><i class="fa fa-key" aria-hidden="true"></i>change
                    password</a>
                </li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="#">logout</a></li>
              </ul>
            </li>
            <li class="nav-item nav-link">

              <i id="cartButton" data-bs-toggle="modal" data-bs-target="#cartModal" class="fa fa-cart-arrow-down" aria-hidden="true"></i>

            </li>
          </ul>
        </div>
      </div>
    </nav>
  </section>

  <!-- catchy begining -->
  <!-- carousell -->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active carousel-inner">
        <img src="IMAGES/cr1.jpg" class="d-block w-100 carou_img" alt="..." />
        <div class="carousel-caption d-md-block">
          <p class="c_text montserrat-carousel text-fluid">
            Laughter is brightest in the place where the food is
          </p>
          <h5 class="source-code-pro-carousel">Irish Proverb</h5>
        </div>
      </div>
      <div class="carousel-item active carousel-inner">
        <img src="IMAGES/cr2.jpg" class="d-block w-100 carou_img" alt="..." />
        <div class="carousel-caption d-md-block">
          <p class="c_text montserrat-carousel text-fluid">
            All happiness depends on a leisurely breakfast
          </p>
          <h5 class="source-code-pro-carousel">John Gunther</h5>
        </div>
      </div>
      <div class="carousel-item active carousel-inner">
        <img src="IMAGES/cr3.jpg" class="d-block w-100 carou_img" alt="..." />
        <div class="carousel-caption d-md-block">
          <p class="c_text montserrat-carousel text-fluid">
            Food is our common ground, a universal experience
          </p>
          <h5 class="source-code-pro-carousel">James Beard</h5>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!--                                                beverage                    -->
  <section id="beverages" class="bv">

    <div class=" text-center">
      <h2 class="heading_font heading_text">beverage</h2>
    </div>


    <!-- signature beverage section -->
    <?php

    $sql = "SELECT * FROM signature_dish WHERE category = 'signature1'"; // Replace 'your_table_name' with the actual table name
    $result = mysqli_query($con, $sql);
    ?>
    <div class="card sig_dish mb-3">
      <div class="row g-3">
        <?php
        // Check if there are items in the database
        if (mysqli_num_rows($result) > 0) {
          // Output data of each item
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="col-md-4">
              <!-- Fetch and display the image from the database -->
              <img src="<?php echo $row['img_url']; ?>" class="img-fluid rounded sig_img" alt="<?php echo $row['name']; ?>" />
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <!-- Display the name -->
                <h5 class="card-title text-center montserrat_signature"><?php echo $row['name']; ?></h5>
                <!-- Display the description -->
                <p class="card-text text-center"><?php echo $row['description']; ?></p>
                <!-- Display the price -->
                <p class="text-center card_price">Price: <?php echo $row['price']; ?></p>
                <p class="card-text row">
                  <!-- Assuming you also want to display a button -->
                <div class="text-body-secondary col bt_flex ">

                  <button class="btn btn_sig btn-primary btn-lg add-to-cart">Add to Cart</button>
                </div>
                </p>
              </div>
            </div>
        <?php
          }
        } else {
          // If no items are found in the database
          echo "No items available.";
        }
        ?>
      </div>
    </div>

    <!-- beverage cards -->
    <div class="row beverage_m">
      <?php
      $sql = "SELECT * FROM menu WHERE category = 'beverage'";
      $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <div class="col-lg-3 col-md-6 col-sm-6 beverage_row" id="num1">
            <div class="card ca_bg">
              <img src="<?php echo $row['img_url']; ?>" class="card-img-top rounded bo-img" alt="<?php echo $row['name']; ?>">
              <div class="card-body text-center">
                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                <p class="card-text"><?php echo $row['description']; ?></p>
                <p class="card-text card_price">Price: <?php echo $row['price']; ?></p>
                <button class="btn cart_btn add-to-cart">Add to cart</button>
              </div>
            </div>
          </div>
      <?php
        }
      } else {
        echo "0 results";
      }

      // Close connection

      ?>
    </div>
    </div>
  </section>

  <!--                            desert                                   -->
  <section id="desert">
    <div class="text-center">
      <h2 class="heading_font heading_text">deserts</h2>
    </div>


    <!-- desert signature dish -->
    <?php

    $sql = "SELECT * FROM signature_dish WHERE category = 'signature2'"; // Replace 'your_table_name' with the actual table name
    $result = mysqli_query($con, $sql);
    ?>
    <div class="card sig_dish mb-3">
      <div class="row g-3">
        <?php
        // Check if there are items in the database
        if (mysqli_num_rows($result) > 0) {
          // Output data of each item
          while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <div class="col-md-8">
              <div class="card-body">
                <!-- Display the name -->
                <h5 class="card-title text-center montserrat_signature"><?php echo $row['name']; ?></h5>
                <!-- Display the description -->
                <p class="card-text text-center"><?php echo $row['description']; ?></p>
                <!-- Display the price -->
                <p class="text-center card_price">Price: <?php echo $row['price']; ?></p>
                <p class="card-text row">
                  <!-- Assuming you also want to display a button -->
                <div class="text-body-secondary col bt_flex ">

                  <button class="btn btn_sig btn-primary btn-lg add-to-cart">Add to Cart</button>
                </div>
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <!-- Fetch and display the image from the database -->
              <img src="<?php echo $row['img_url']; ?>" class="img-fluid rounded sig_img" alt="<?php echo $row['name']; ?>" />
            </div>
        <?php
          }
        } else {
          // If no items are found in the database
          echo "No items available.";
        }
        ?>
      </div>
    </div>

    <!-- deserts card -->
    <div class="row beverage_m">
      <?php
      $sql = "SELECT * FROM menu WHERE category = 'beverage'";
      $result = mysqli_query($con, $sql);
      if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <div class="col-lg-3 col-md-6 col-sm-6 beverage_row" id="num1">
            <div class="card ca_bg">
              <img src="<?php echo $row['img_url']; ?>" class="card-img-top rounded bo-img" alt="<?php echo $row['name']; ?>">
              <div class="card-body text-center">
                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                <p class="card-text"><?php echo $row['description']; ?></p>
                <p class="card-text card_price">Price: <?php echo $row['price']; ?></p>
                <button class="btn cart_btn add-to-cart">Add to cart</button>
              </div>
            </div>
          </div>
      <?php
        }
      } else {
        echo "0 results";
      }

      // Close connection

      ?>
    </div>
    </div>
  </section>

  <!-- testimonial -->
  <?php
  $sql = "SELECT * FROM testimonial";
  $result = mysqli_query($con, $sql);
  ?>
  <section id="testimonial">

    <!-- // Fetch carousel items from the database -->
    <div id="carouselTestimonial" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php
        // Check if there are testimonial items in the database
        if (mysqli_num_rows($result) > 0) {
          $active = true; // Set the first item as active
          // Output data of each testimonial item
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="carousel-item carousel-inner <?php echo $active ? 'active' : ''; ?>">
              <img src="<?php echo $row['img_url']; ?>" class="d-block w-100 carou_img" alt="Background Image">
              <div class="carousel-caption d-md-block">
                <p class="c_text montserrat-carousel text-fluid">
                  <?php echo $row['comment']; ?>
                </p>
                <h5 class="source-code-pro-carousel"><?php echo $row['name']; ?></h5>
                <!-- Assuming you also want to display a profile picture -->
                <img src="<?php echo $row['profile_url']; ?>" class="testimonial-image" alt="Profile Picture">
              </div>
            </div>
        <?php
            // After the first item, set $active to false
            $active = false;
          }
        } else {
          echo "No testimonials available.";
        }
        ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselTestimonial" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselTestimonial" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

  </section>

  <!-- CONTACTS -->
  <section id="contacts"></section>
  <footer class="non-colored-section" id="footer">
    <div class="ending">
      <div>
        <i class="fa-brands fa-twitter footer-brand-logo"></i>
        <i class="fa-brands fa-facebook-f footer-brand-logo"></i>
        <i class="fa-brands fa-instagram footer-brand-logo"></i>
        <i class="fa-sharp fa-solid fa-envelope footer-brand-logo"></i>
        <p class="text-center">©Copyright RMS</p>
      </div>
    </div>
  </footer>

  <!-- cart modal -->
  <!-- <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Shopping Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Cart Content will be dynamically added here -->
  <!-- <div id="cart"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div> -->

  <!-- cart modal -->
  <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h1 class="modal-title fs-5 text-center " id="cartModalLabel">cart</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="cart"></div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
  </script>
  <!-- javascript link -->

  <script src="javascript/cart.js"></script>

</body>

</html>