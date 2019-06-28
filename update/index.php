<?php
@include "../db.php";
$id = $_POST["id"];
$title = $_POST["title"];
$detail = $_POST["detail"];

$sql = "UPDATE articles SET title = '$title' , detail = '$detail' WHERE id = $id";

if ($conn->query($sql) === true) {
    echo json_encode(['message' => "Update Article Successfully"]);
} else {
    echo json_encode(['message' => "Error: " . $conn->error]);
}

$conn->close();
