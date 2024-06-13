<?php
header('Content-Type: application/json; charset=utf-8');
require_once '../session.php';
require_once '../connections.php';
require_once '../functions.php';

$uid = $_SESSION['user_id'];
if ($_SESSION['role'] != 'cashier') {
    echo json_encode(['message' => 'Access denied', 'status' => 'error'], true);
    die();
}


$sql = "INSERT INTO payments ( confirmed_by, ammount, mode, user_id) VALUES ( $uid , $_POST[ammount], 'cash', $_POST[user_id])";


$sql2 = "UPDATE cart SET status = 'complete' WHERE cart.ID = $_POST[id]";


if (!mysqli_query($con, $sql)) {
    echo json_encode(['message' => 'Unknown Error', 'status' => 'error'], true);
    die();
}
if (!mysqli_query($con, $sql2)) {
    echo json_encode(['message' => 'Unknown Error', 'status' => 'error'], true);
    die();
}
echo json_encode(['message' => 'Order onfirmed successfully', 'status' => 'success'], true);
die();
