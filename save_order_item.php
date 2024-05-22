<?php
session_start();
include("connections.php");
include("functions.php");

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve data from the request body
  $data = json_decode(file_get_contents("php://input"), true);

  // Validate data (you can add more validation as needed)
  if (!isset($data['productId']) || !isset($data['productName']) || !isset($data['quantity']) || !isset($data['totalPrice']) || !isset($data['userId'])) {
    http_response_code(400); // Bad request
    echo json_encode(array("message" => "Incomplete data provided."));
    exit();
  }

  // Sanitize the data
  $productId = mysqli_real_escape_string($con, $data['productId']);
  $productName = mysqli_real_escape_string($con, $data['productName']);
  $quantity = mysqli_real_escape_string($con, $data['quantity']);
  $totalPrice = mysqli_real_escape_string($con, $data['totalPrice']);
  $userId = mysqli_real_escape_string($con, $data['userId']);

  // Insert order item into the database
  $sql = "INSERT INTO orders (user_id, product_id, product_name, quantity, total_price) VALUES ('$userId', '$productId', '$productName', '$quantity', '$totalPrice')";

  if (mysqli_query($con, $sql)) {
    // Order item inserted successfully
    http_response_code(201); // Created
    echo json_encode(array("message" => "Order item saved successfully."));
  } else {
    // Error inserting order item
    http_response_code(500); // Internal server error
    echo json_encode(array("message" => "Failed to save order item."));
  }
} else {
  // Invalid request method
  http_response_code(405); // Method Not Allowed
  echo json_encode(array("message" => "Method not allowed."));
}
