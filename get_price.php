<?php
// Include necessary files and establish database connection if needed
include("connections.php"); // Assuming this file contains your database connection code

// Check if the product ID is provided in the URL parameter
if (isset($_GET['product_id'])) {
	// Sanitize the input to prevent SQL injection
	$product_id = mysqli_real_escape_string($con, $_GET['product_id']); // Assuming $con is your database connection object

	// Query to fetch the price from the database based on the product ID
	$sql = "SELECT price FROM menu WHERE ID = '$product_id'"; // Assuming 'menu' is your table name

	// Execute the query
	$result = mysqli_query($con, $sql);

	// Check if the query was successful
	if ($result) {
		// Check if the product with the given ID exists
		if (mysqli_num_rows($result) > 0) {
			// Fetch the price from the result set
			$row = mysqli_fetch_assoc($result);
			$price = $row['price'];

			// Return the price as JSON response
			echo json_encode(array('price' => $price));
		} else {
			// Product with the given ID not found
			echo json_encode(array('error' => 'Product not found'));
		}
	} else {
		// Query execution failed
		echo json_encode(array('error' => 'Query execution failed'));
	}
} else {
	// Product ID parameter not provided
	echo json_encode(array('error' => 'Product ID not provided'));
}
