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

$order_query = "SELECT COUNT(*) AS total_orders FROM  cart where status = 'pending'";
$order_result = mysqli_query($con, $order_query);
$order_data = mysqli_fetch_assoc($order_result);
$total_order = $order_data['total_orders'];

//tables available                
$reservation_query = "SELECT COUNT(*) AS total_tables FROM tables WHERE status = 'available'";
$reservation_result = mysqli_query($con, $reservation_query);
$reservation_data = mysqli_fetch_assoc($reservation_result);
$total_reservation = $reservation_data['total_tables'];


// total revenue
// Calculate total revenue
$total_revenue_query = "SELECT SUM(price) AS total_revenue FROM cart WHERE status = 'complete'";
$total_revenue_result = mysqli_query($con, $total_revenue_query);
$total_revenue_data = mysqli_fetch_assoc($total_revenue_result);
$total_revenue = $total_revenue_data['total_revenue'];
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashier</title>

    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- faicons -->
    <script src="https://kit.fontawesome.com/87a971dd65.js" crossorigin="anonymous"></script>
    <!-- boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cactus+Classical+Serif&display=swap" rel="stylesheet">

    <style>
        body {
            padding: 0 10px;
            background: url(IMAGES/miik.jpg);
            background-size: cover;
            /* Ensures the background image covers the entire page */
            background-repeat: no-repeat;
            background-attachment: fixed;

        }

        .cactus-classical-serif-regular {
            font-family: "Cactus Classical Serif", serif;
            font-weight: 400;
            font-style: normal;
        }


        .menu_data {
            background: url(IMAGES/set-table.jpg);
            transition: all 0.6s ease;
            background-position-y: 29%;
            background-position-x: 135%;
            padding: 10px;
            height: 150px;
            width: 270px;
            border-radius: 15px;
            color: white;
            font-size: 1.4rem;
            display: flex;
            box-shadow: 5px 5px .54em rgba(15,
                    67,
                    126);
            justify-content: end;
            align-items: flex-end;
        }

        .order_data {
            background: url(IMAGES/order_logo.jpg);
            transition: all 0.6s ease;
            background-position-y: 29%;
            background-position-x: 25%;
            padding: 10px;
            height: 150px;
            width: 270px;
            border-radius: 15px;
            color: white;
            font-size: 1.4rem;
            display: flex;
            box-shadow: 5px 5px .54em rgba(15,
                    67,
                    126);
            justify-content: end;
            align-items: flex-end;
        }

        .rev_data {
            background: url(IMAGES/mone.jpg);
            transition: all 0.6s ease;
            background-position-y: 29%;
            background-position-x: 25%;
            padding: 10px;
            height: 150px;
            width: 270px;
            border-radius: 15px;
            color: white;
            font-size: 1.4rem;
            display: flex;
            box-shadow: 5px 5px .54em rgba(15,
                    67,
                    126);
            justify-content: end;
            align-items: flex-end;
        }

        .top_holder {
            padding: 50px 30px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            gap: 2.1em;
        }

        .cd {
            display: flex;
            justify-content: end;
        }

        .tes {
            margin: 0;
        }

        .d_t {
            padding: 0 20px;
        }

        .r {
            display: flex;
            justify-content: center;
            margin: 30px;
        }
    </style>
</head>

<body>
    <section id="navbar3">
        <nav class=" cd navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="bx bx-bowl-rice bx-md"></i><span>RMS</span>
                </a>
                <button class=" ms-auto navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="   collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="cashier.php">Home</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link " href="tablessetting.php">TABLES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="logout.php">logout</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </section>



    <section>
        <div class="top_holder">

            <div class="menu_data">
                <p class="tes"> <?php echo $total_reservation ?> Tables Available</p>
            </div>
            <div class="order_data">
                <p class="tes"> <?php echo $total_order ?> Orders Pending</p>
            </div>
            <div class="rev_data">
                <p class="tes"> <?php echo $total_revenue ?>$ in revenue</p>
            </div>
        </div>
    </section>


    <div class="r">
        <h3>Recent Orders</h3>
    </div>

    <section class="d_t">

        <table class="table  ">
            <?php

            $select_cart_products = mysqli_query($con, "SELECT * FROM cart");


            if (mysqli_num_rows($select_cart_products) > 0) {

                echo " <thead class='text-center  align-middle'>
<tr>
    <th scope='col'>id</th>
    <th scope='col'>image</th>
    <th scope='col'>Price</th>
    <th scope='col'>name</th>
    <th scope='col'>category</th>
    <th scope='col'>quantity</th>
    <th scope='col'>status</th>
    <th scope='col'>user id</th>
    <th scope='col'>Action</th>

</tr>
</thead>;
<tbody class='text-center align-middle'>";

                $si_no = 1;

                while ($fetch_cart_products = mysqli_fetch_assoc($select_cart_products)) {
            ?>

                    <tr id="cart_item<?php echo $fetch_cart_products['ID']; ?>">
                        <th scope="row"><?php echo $si_no++; ?></th>
                        <td><img src="IMAGES/<?php echo $fetch_cart_products['image']; ?>" alt="" style="width: 50px;"></td>
                        <td><?php echo $fetch_cart_products['price']; ?></td>
                        <td><?php echo $fetch_cart_products['name']; ?></td>
                        <td><?php echo $fetch_cart_products['category']; ?></td>
                        <td><?php echo $fetch_cart_products['quantity']; ?></td>
                        <td class='stst'><?php echo $fetch_cart_products['status']; ?></td>
                        <td><?php echo $fetch_cart_products['user_id']; ?></td>

                        <td class='ccbutton'>
                            <?php
                            if ($fetch_cart_products['status'] != 'complete') {
                            ?>
                                <button class="btn btn-success" onclick="handleSubmit(<?php echo $fetch_cart_products['price'] . ',' . $fetch_cart_products['ID'] . ',' . $fetch_cart_products['user_id'] ?>)">
                                    Confirm
                                </button>
                            <?php
                            }
                            ?>
                        </td>


                    </tr>

            <?php
                }
            }
            ?>
        </table>
        </table>
    </section>




    <!-- boostrp -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        const handleSubmit = async (ammount, id, user_id) => {

            let body = new FormData();
            body.append("ammount", ammount);
            body.append("id", id);
            body.append("user_id", user_id);

            let response = await fetch("./api/confirm_oder.php", {
                method: "POST",
                body,
            });
            let data = await response.json();
            if (data.status == 'success') {
                document.querySelector('#cart_item' + id + ">.stst").innerHTML = "complete"
                document.querySelector('#cart_item' + id + ">.ccbutton").innerHTML = ""
            } else {
                window.alert(data.status.message)
            }
        }
    </script>
</body>

</html>