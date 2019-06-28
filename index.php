<?php
@include "db.php";

$sql = "SELECT * FROM articles ORDER BY created_at desc";
$result = $conn->query($sql);

$datas = array();

//Fetch into associative array
while ($row = $result->fetch_assoc()) {
    $datas[] = $row;
}

echo json_encode($datas, JSON_NUMERIC_CHECK);

$conn->close();
