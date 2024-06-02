
<?php
include("connections.php");
include("functions.php");

if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  // Corrected the SQL query with backticks for table name
  $delete_query = mysqli_query($con, "DELETE FROM `menu` WHERE `ID` = $delete_id") or die("Query failed");

  if ($delete_query) {
    echo "Product has been deleted";
    header('Location: admin_settings_viewproducts.php');
  } else {
    echo "Product not deleted";
    header('Location: admin_settings_viewproducts.php');
  }
}
?>
