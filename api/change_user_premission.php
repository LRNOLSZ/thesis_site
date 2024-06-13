<?php
header('Content-Type: application/json; charset=utf-8');
require_once '../session.php';
require_once '../connections.php';
require_once '../functions.php';

$uid = $_SESSION['user_id'];
if ($_SESSION['role'] != 'admin') {
    echo json_encode(['message' => 'Access denied' . $_SESSION['role'], 'status' => 'error'], true);
    die();
};


$sql2 = "UPDATE users SET role = '$_POST[role]' WHERE ID = $_POST[user_id];";



if (!mysqli_query($con, $sql2)) {
    echo json_encode(['message' => 'Unknown Error', 'status' => 'error'], true);
    die();
}
echo json_encode(['message' => 'Role Update successfully', 'status' => 'success'], true);
die();
