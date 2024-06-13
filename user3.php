<?php
session_start();
include("connections.php");
include("functions.php");


// Fetch menu items from the database
$sql = "SELECT * FROM menu";
$result = mysqli_query($con, $sql);

if (isset($_POST['add_to_cart'])) {
  $products_name = $_POST['product_name'];
  $products_price = $_POST['product_price'];
  $products_description = $_POST['product_description'];
  $products_category = $_POST['product_category'];
  $products_image = $_POST['product_image'];
  $products_quantity = 1;
  $user_id = $_SESSION['user_id']; // Get the user ID from the session
  $status = 'pending'; // Set the status to 'pending'

  // Select cart data based on condition
  $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE name='$products_name' AND user_id='$user_id'");
  if (mysqli_num_rows($select_cart) > 0) {
    $display_message[] = "Product already in cart";
  } else {
    // Insert into cart
    $insert_products = mysqli_query($con, "INSERT INTO `cart` (name, price, description, category, image, quantity, user_id, status) VALUES ('$products_name', '$products_price', '$products_description', '$products_category', '$products_image', $products_quantity, '$user_id', '$status')");
    $display_message[] = "Product added to cart";
  }
}

?>
<?php
//var_dump($_SESSION);
//die();
?>

<?php //echo isset($_SESSION['user_id']);
//die();


?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- boostrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


  <!-- monstserrat font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />

  <!--fa icons-->
  <script src="https://kit.fontawesome.com/87a971dd65.js" crossorigin="anonymous"></script>
  <!-- css -->

  <!-- css -->
  <link rel="stylesheet" href="styles_folder/user.css" />

  <style>
    .im {

      border-radius: 20px;
      box-shadow: rgba(0, 0, 0 .4);
    }

    .h_g {
      display: flex;
      width: 100vw;
      flex-wrap: wrap;
      padding: 10px;
      justify-content: center;

    }

    .contt {
      flex-grow: 1;
      display: flex;
      justify-content: center;
    }

    .ce {

      margin: 30px 0;
    }

    .cent {
      margin: 10px 10px;
    }

    .igg {
      overflow: hidden;
      width: min(500px, 100%);
      box-shadow: 10px 7px 18px 3px;
      border-radius: 20px;

    }

    .im1 {
      width: 290px;
      border-radius: 15px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, .5);
      height: 193px;
    }

    .product_cont {
      display: flex;
      justify-content: space-evenly;
      gap: 2em;
      flex-wrap: wrap;
      margin-bottom: 18px;
    }

    .edit_form1 {
      display: flex;
      margin: 35px 0;
      flex-wrap: wrap;
      justify-content: center;
      padding: 0 35px;
    }

    .ending a {
      text-decoration: none;
      color: inherit;
      transition: color 0.5s;
    }

    .ending a:hover {
      color: #007bff;

      overflow: hidden;
      /* Change to desired hover color */
    }
  </style>
</head>

<body>





  <!-- navbar -->
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
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center ">
            <li class="nav-item  ">

              <a class="nav-link active" href="logout.php" alt="shop"><i class="fa-solid fa-right-from-bracket"></i></a>
            </li>
            <li class="nav-item  ">

              <a class="nav-link active" href="fp.php" alt="shop"><i class="fa-solid fa-key"></i></i></a>
            </li>
            <li class="nav-item  ">

              <a class="nav-link active" href="user3.php" alt="shop"><i class="fa-solid fa-shop"></i></a>
            </li>
            <li class="nav-item  ">
              <!-- php -->
              <?php
              $select_product = mysqli_query($con, "SELECT * from cart where user_id = $_SESSION[user_id]  and status != 'complete'") or die("query failed");
              $row_count = mysqli_num_rows($select_product);

              ?>
              <a class="nav-link active" aria-current="page" href="user_viewcart.php"><i class="fa-solid fa-cart-shopping"></i><span><sup><?php echo $row_count; ?></sup></span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </section>

  <!-- carousel -->
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


  <!-- beverage -->
  <section id="beverages" class="bv">

    <div class=" text-center">
      <h2 class="heading_font heading_text">beverage</h2>
    </div>


    <!-- signature beverage section -->
    <?php

    $sql = "SELECT * FROM signature_dish WHERE category = 'signature1'"; // Replace 'your_table_name' with the actual table name
    $result = mysqli_query($con, $sql);
    ?>

    <div class="h_g">
      <?php
      // Check if there are items in the database
      if (mysqli_num_rows($result) > 0) {
        // Output data of each item
        while ($row = mysqli_fetch_assoc($result)) {
      ?>
          <form action="" method="post">
            <div class="edit_form1">
              <div class="igg">
                <img src="<?php echo $row['img_url']; ?>" class="im img-fluid" alt="" />
              </div>
              <div class=" contt">
                <div class="ce">
                  <!-- Display the name -->
                  <h5 class=" text-center  cent montserrat_signature"><?php echo $row['name']; ?></h5>
                  <!-- Display the description -->
                  <p class=" text-center cent"><?php echo $row['description']; ?></p>
                  <!-- Display the price -->
                  <p class=" text-center cent">Price: Price: <?php echo $row['price']; ?> </p>
                  <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                  <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
                  <input type="hidden" name="product_description" value="<?php echo $row['description']; ?>">
                  <input type="hidden" name="product_category" value="<?php echo $row['category']; ?>">
                  <input type="hidden" name="product_image" value="<?php echo $row['img_url']; ?>">


                  <div class=" text-center cent">
                    <button class="btn btn_sig btn-primary btn-lg add-to-cart" name="add_to_cart">Add to Cart</button>
                  </div>
                </div>
              </div>
            </div>


          </form>


    </div>
<?php
        }
      } else {
        // If no items are found in the database
        echo "No items available.";
      }
?>
</div>




<!-- beverage cards -->

<div class="product_cont">
  <?php
  // remember to add condition beverage
  $select_products = mysqli_query($con, "SELECT * FROM `menu` where category ='beverage'");
  if (mysqli_num_rows($select_products) > 0) {
    while ($fetch_product = mysqli_fetch_assoc($select_products)) {
  ?>
      <form action="" method="post">
        <div class="edit_form">
          <img class="im1" src="IMAGES/<?php echo $fetch_product['img_url']; ?>" alt="">
          <h3 class="text-center"><?php echo $fetch_product['name']; ?></h3>
          <div class="price text-center"><?php echo $fetch_product['price']; ?></div>
          <div class="text-center">
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_description" value="<?php echo $fetch_product['description']; ?>">
            <input type="hidden" name="product_category" value="<?php echo $fetch_product['category']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['img_url']; ?>">
            <button class="btn btn-primary btn_sig" name="add_to_cart">Add to Cart</button>
          </div>
        </div>
      </form>
  <?php
    }
  } else {
    echo "<p class='text-center'>No products available</p>";
  }
  ?>
</div>
</div>
</div>
  </section>


  <!-- deseeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeert -->
  <!-- desert -->

  <section id="desert">
    <div class="text-center">
      <h2 class="heading_font heading_text">deserts</h2>
    </div>

    <!-- signature desert -->
    <?php

    $sql = "SELECT * FROM signature_dish WHERE category = 'signature2'"; // Replace 'your_table_name' with the actual table name
    $result = mysqli_query($con, $sql);
    ?>

    <div class="h_g">
      <?php
      // Check if there are items in the database
      if (mysqli_num_rows($result) > 0) {
        // Output data of each item
        while ($row2 = mysqli_fetch_assoc($result)) {
      ?>
          <form action="" method="post">
            <div class="edit_form1">

              <div class=" contt">
                <div class="ce">
                  <!-- Display the name -->
                  <h5 class=" text-center  cent montserrat_signature"><?php echo $row2['name']; ?></h5>
                  <!-- Display the description -->
                  <p class=" text-center cent"><?php echo $row2['description']; ?></p>
                  <!-- Display the price -->
                  <p class=" text-center cent">Price: Price: <?php echo $row2['price']; ?> </p>
                  <input type="hidden" name="product_name" value="<?php echo $row2['name']; ?>">
                  <input type="hidden" name="product_price" value="<?php echo $row2['price']; ?>">
                  <input type="hidden" name="product_description" value="<?php echo $row2['description']; ?>">
                  <input type="hidden" name="product_category" value="<?php echo $row2['category']; ?>">
                  <input type="hidden" name="product_image" value="<?php echo $row2['img_url']; ?>">


                  <div class=" text-center cent">
                    <button class="btn btn_sig btn-primary btn-lg add-to-cart" name="add_to_cart">Add to Cart</button>
                  </div>
                </div>
              </div>
              <div class="igg">
                <img src="<?php echo $row2['img_url']; ?>" class="im img-fluid" alt="" />
              </div>
            </div>


          </form>


    </div>
<?php
        }
      } else {
        // If no items are found in the database
        echo "No items available.";
      }
?>
</div>




<!-- desert cards -->

<div class="product_cont">
  <?php
  //remember to add condition to fetech deserts
  $select_products = mysqli_query($con, "SELECT * FROM `menu` where category ='desert'");
  if (mysqli_num_rows($select_products) > 0) {
    while ($fetch_product = mysqli_fetch_assoc($select_products)) {
  ?>
      <form action="" method="post">
        <div class="edit_form">
          <img class="im1" src="IMAGES/<?php echo $fetch_product['img_url']; ?>" alt="">
          <h3 class="text-center"><?php echo $fetch_product['name']; ?></h3>
          <div class="price text-center"><?php echo $fetch_product['price']; ?></div>
          <div class="text-center">
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_description" value="<?php echo $fetch_product['description']; ?>">
            <input type="hidden" name="product_category" value="<?php echo $fetch_product['category']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['img_url']; ?>">
            <button class="btn btn_sig btn-primary" name="add_to_cart">Add to Cart</button>
          </div>
        </div>
      </form>
  <?php
    }
  } else {
    echo "<p class='text-center'>No products available</p>";
  }
  ?>
</div>
</div>
</div>

  </section>

  <!-- testimonial -->


  <section id="testimonial">

    <?php
    $sql = "SELECT * FROM testimonial";
    $result = mysqli_query($con, $sql);
    ?>

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
  <section id="contacts">
    <footer class="non-colored-section" id="footer">
      <!-- <div class="ending">
        <div>
          <i class="fa-brands fa-twitter footer-brand-logo"></i>
          <i class="fa-brands fa-facebook-f footer-brand-logo"></i>
          <i class="fa-brands fa-instagram footer-brand-logo"></i>
          <i mail class="fa-sharp fa-solid fa-envelope footer-brand-logo"></i>
          <p class="text-center">©Copyright RMS</p>
        </div>
      </div>
    </footer> -->
      <footer>
        <div class="ending">
          <div>
            <a href="https://twitter.com">
              <i class="fab 2fa fa-twitter footer-brand-logo"></i>
            </a>
            <a href="https://facebook.com">
              <i class="fab fa2 fa-facebook-f footer-brand-logo"></i>
            </a>
            <a href="https://instagram.com">
              <i class="fab fa2 fa-instagram footer-brand-logo"></i>
            </a>
            <a href="mailto:your.email@example.com">
              <i class="fas fa2 fa-envelope footer-brand-logo"></i>
            </a>
            <p class="text-center">© Copyright RMS</p>
          </div>
        </div>
      </footer>

  </section>

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

        </div>
        <div class="modal-body">
          <div id="cart"></div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
          <div id="totalPrice"></div>
          <button type="button" class="btn btn-primary" id="confirmOrder"> Confirm order</button>
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

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const addToCartButtons = document.querySelectorAll('.add-to-cart');
      const userId =
        <?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'null'; ?>; // Retrieve user ID from session 

      addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
          // Find the parent element that contains the product details
          const productContainer = this.closest('.card-body');
          const productId = this.getAttribute('data-product-id'); // Get the product ID

          // Fetch the price from the server based on the product ID
          fetchPrice(productId)
            .then(price => {
              const name = productContainer.querySelector('.card-title')
                .innerText;
              addToCartModal(name, price);
            })
            .catch(error => {
              console.error('Error fetching price:', error);
            });
        });
      });

      function fetchPrice(productId) {
        return fetch(`get_price.php?product_id=${productId}`)
          .then(response => {
            if (!response.ok) {
              throw new Error('Network response was not ok');
            }
            return response.json();
          })
          .then(data => {
            return data.price;
          });
      }

      function addToCartModal(name, price) {
        const cartItem = `
            <div class container-fluid>
                <div class="cart-item my-2 row">
                    <span class="col-md-3">${name}</span>
                    <span class="total col-md-3">${price}</span>
                    <input type="number" value="1" min="1" class="quantity col-md-3">
                    <button class="btn btn-outline-danger col-md-3 ml-1 btn-remove">Remove</button>
                </div>
            </div>
        `;
        document.getElementById('cart').insertAdjacentHTML('beforeend', cartItem);

        // Add event listener to the remove button
        const removeButtons = document.querySelectorAll('.btn-remove');
        removeButtons.forEach(button => {
          button.addEventListener('click', function() {
            this.closest('.cart-item').remove();
            updateTotalPrice(); // Update total price when an item is removed
          });
        });

        // Add event listener to the quantity input
        const quantityInputs = document.querySelectorAll('.quantity');
        quantityInputs.forEach(input => {
          input.addEventListener('input', function() {
            updateTotalPrice(); // Update total price when quantity changes
          });
        });

        // Calculate and update the total price
        function updateTotalPrice() {
          let totalPrice = 0;
          document.querySelectorAll('.cart-item').forEach(item => {
            const itemPrice = parseFloat(item.querySelector('.total').innerText.replace('$',
              ''));
            const quantity = parseInt(item.querySelector('.quantity').value);
            totalPrice += itemPrice * quantity;
          });
          document.getElementById('totalPrice').innerText = `Total Price: $${totalPrice.toFixed(2)}`;
        }
      }

      // Show modal when the cart button is clicked
      document.getElementById('cartButton').addEventListener('click', function() {
        const cartModal = new bootstrap.Modal(document.getElementById('cartModal'));
        cartModal.show();
      });
    });

    // Assuming the Confirm order button has an ID attribute 'confirmOrder'
    document.getElementById('confirmOrder').addEventListener('click', function() {
      // Loop through each cart item
      document.querySelectorAll('.cart-item').forEach(item => {
        // Retrieve product details
        const productName = item.querySelector('.col-md-3').innerText;
        const quantity = item.querySelector('.quantity').value;
        const totalPrice = parseFloat(item.querySelector('.total').innerText.replace('$', ''));
        const productId = item.dataset.productId; // Get the product ID from the dataset
        const userId = <?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'null'; ?>
        // const userId =
        //   <?php //echo isset($_SESSION['user_id']); 
              ?>
        ;
        // ? $_SESSION['user_id'] : 'null'


        // Insert into database
        fetch('save_order_item.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json'
            },
            body: JSON.stringify({
              productId: productId, // Include product ID
              productName: productName,
              quantity: quantity,
              totalPrice: totalPrice,
              userId: userId // Assuming userId is already defined
            })
          })
          .then(response => {
            if (!response.ok) {
              throw new Error('Failed to save order item');
            }
            return response.json();
          })
          .then(data => {
            // Handle success response if needed
          })
          .catch(error => {
            console.error('Error saving order item:', error);
          });
      });
    });
  </script>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>