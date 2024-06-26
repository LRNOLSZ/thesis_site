<?php
session_start();
include("connections.php");
include("functions.php");

$grand_total = 0;

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    // Redirect to login if the user is not logged in
    header("Location: index.php");
    exit(); // Add an exit to prevent further execution
}

// Update query
if (isset($_POST['update_product_quantity'])) {
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($con, "UPDATE cart SET quantity=$update_value WHERE ID=$update_id");
    if ($update_quantity_query) {
        header('Location: user_viewcart.php');
        exit(); // Add an exit to prevent further execution
    }
}

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($con, "DELETE FROM cart WHERE ID=$remove_id");
}

if (isset($_GET['delete_all'])) {
    mysqli_query($con, "DELETE FROM cart WHERE user_id = $user_id");
    header('Location: user_viewcart.php');
    exit(); // Add an exit to prevent further execution
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/87a971dd65.js" crossorigin="anonymous"></script>

    <style>
        :root {
            --primary-color1: #D9985F;
            /* Blue */
            --secondary-color2: #91B7D9;
            /* Gray */
            /* Yellow */
            --primary-color4: #454743;
        }

        /* Add your custom styles here */
        /* Example:
      .custom-class {
        color: blue;
      }
    */
        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            background-color:#91B7D9 ;
        }

        .navbar {
            background: var(--primary-color1);
        }

        .hoo {
            padding: 40px 20px;
        }

        .d_buttons {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            background: rgba(15, 67, 126, 0.445);
            height: 90px;
            align-items: center;
            padding: 0 20px;
            
        }

        .delete_bt {
            margin-top: 20px;
        }

        .cart_title {
            display: flex;
            justify-content: center;
        }

        .fas:hover {
            color: red;
        }

        .in {
            width: 20%;
        }

        .display_m {
            display: flex;
            justify-content: center;
            background-color:#454743;
            padding: 10px;
            margin-top: 1rem;
            margin-inline: auto;
            width: min(300px, 100%);
            border-radius: 5px;
            color:white;
        }
    </style>

</head>

<body>

    <!-- Navigation bar -->
    <?php
    require_once './components/user_nav.php';
    ?>


    <div class="hoo">
        <div class="cart_title">
            <div>
                <h2>My Cart</h2>
            </div>
        </div>
        <table class="table">
            <?php
            $select_cart_products = mysqli_query($con, "SELECT * FROM cart WHERE user_id = $user_id");


            if (mysqli_num_rows($select_cart_products) > 0) {
                echo '<thead class="table-secondary">
                        <tr>
                            <th scope="col" class="text-center">SI No</th>
                            <th scope="col" class="text-center">Product Image</th>
                            <th scope="col" class="text-center">Product Name</th>
                            <th scope="col" class="text-center">Product Price</th>
                            <th scope="col" class="text-center">Product Description</th>
                            <th scope="col" class="text-center">Product Category</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-center">Total Price</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>';

                $si_no = 1;
                while ($fetch_cart_products = mysqli_fetch_assoc($select_cart_products)) {
                    if ($fetch_cart_products['status'] == 'complete') {
                        continue;
                    }
            ?>
                    <tr>
                        <th class="text-center" scope="row"><?php echo $si_no++; ?></th>
                        <td class="text-center"><img src="IMAGES/<?php echo $fetch_cart_products['image']; ?>" alt="" style="width: 50px;"></td>
                        <td class="text-center"><?php echo $fetch_cart_products['name']; ?></td>
                        <td class="text-center">$<?php echo $fetch_cart_products['price']; ?></td>
                        <td class="text-center"><?php echo $fetch_cart_products['description']; ?></td>
                        <td class="text-center"><?php echo $fetch_cart_products['category']; ?></td>
                        <form action="" method="post">
                            <input type="hidden" value="<?php echo $fetch_cart_products['ID']; ?>" name="update_quantity_id">
                            <td class="text-center hlq">
                                <input type="number" min="1" class="in" value="<?php echo $fetch_cart_products['quantity']; ?>" name="update_quantity">
                                <button class=" btn btn-secondary" name="update_product_quantity">Update</button>
                            </td>
                        </form>
                        <td scope="col" class="text-center"><?php echo $subtotal = number_format($fetch_cart_products['price'] * $fetch_cart_products['quantity']); ?></td>
                        <td class="text-center">
                            <a href="?remove=<?php echo $fetch_cart_products['ID']; ?>" class="delete_product_btn" onclick="return confirm('Are you sure you want to delete this product?');">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
            <?php
                    $grand_total += $fetch_cart_products['price'] * $fetch_cart_products['quantity'];
                }
                echo '</tbody>';
            } else {
                echo '<div class="display_m">
                        <span>No products in cart</span>
                      </div>';
            }
            ?>
        </table>

        <?php
        if ($grand_total > 0) {
        ?>
            <div class="d_buttons">
                <div class="d_B"><button class="btn btn-secondary" onclick="window.location.href='user3.php'">Continue Shopping</button></div>
                <div class="d_B"><button class="btn btn-secondary">Grand Total: $<?php echo number_format($grand_total, 2); ?></button></div>
                <div class="d_B"><button class="btn btn-secondary" onclick="window.location.href='index.php'">Proceed to Checkout</button></div>
            </div>

        <?php
        }
        ?>
    </div>
    <!-- histry -->



    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>