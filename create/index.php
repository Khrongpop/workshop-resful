<?php
@include "../db.php";
$title = $_POST["title"];
$detail = $_POST["detail"];

$sql = "INSERT INTO articles (title , detail) VALUES ( '$title' , '$detail' )";

if ($conn->query($sql) === true) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
