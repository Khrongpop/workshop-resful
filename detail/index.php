<?php
@include "../db.php";
$id = $_GET["id"];
$sql = "SELECT * FROM articles where id = $id";
// $sql = "SELECT * FROM articles ORDER BY created_at desc";

$result = $conn->query($sql);

$datas = array();

//Fetch into associative array
while ($row = $result->fetch_assoc()) {
    $datas[] = $row;
}

echo json_encode($datas[0], JSON_NUMERIC_CHECK);

$conn->close();
