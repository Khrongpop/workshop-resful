<?php
@include "../db.php";
$title = $_POST["title"];
$detail = $_POST["detail"];

$sql = "INSERT INTO articles (title , detail) VALUES ( '$title' , '$detail' )";

if ($conn->query($sql) === true) {
    echo json_encode(['message' => "Created Article Successfully"]);
} else {
    echo json_encode(['message' => "Error: " . $conn->error]);
}

$conn->close();
