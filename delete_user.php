<?php
session_start();
include("connections.php");
include("functions.php");

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $user_id = $data['user_id'];

    if (isset($user_id)) {
        $delete_query = "DELETE FROM users WHERE ID = ?";
        if ($stmt = $con->prepare($delete_query)) {
            $stmt->bind_param("i", $user_id);
            if ($stmt->execute()) {
                echo json_encode(["status" => "success"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to delete user."]);
            }
            $stmt->close();
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to prepare query."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "User ID not provided."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
