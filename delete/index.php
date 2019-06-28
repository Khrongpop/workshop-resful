<?php
@include "../db.php";
$id = $_POST["id"];

$sql = "DELETE FROM articles  WHERE id = $id";

if ($conn->query($sql) === true) {
    echo json_encode(['message' => "Delete Article Successfully"]);
} else {
    echo json_encode(['message' => "Error: " . $conn->error]);
}

$conn->close();
