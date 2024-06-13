<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <button class="navbar-toggler  na_btn ms-auto" type="button" style="border: none;" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class=" ms-auto collapse navbar-collapse " id="navbarTogglerDemo01">

            <ul class="navbar-nav    mb-2 mb-lg-0">

                <a class="nav-link active" aria-current="page" href="user3.php">Shop</a>
                </li>
                <li class="nav-item  ms-auto">
                    <!-- php -->
                    <?php
                    $select_product = mysqli_query($con, "SELECT * from cart where user_id = $_SESSION[user_id] and status != 'complete'") or die("query failed");
                $row_count = mysqli_num_rows($select_product);

                    ?>
                    <a class="nav-link active" aria-current="page" href="testing_admin_view_cart.php"><i class="fa-solid fa-cart-shopping"></i><span><sup><?php echo $row_count; ?></sup></span></a>
                </li>


            </ul>

        </div>
    </div>
</nav>