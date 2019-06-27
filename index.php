<?php
@include "db.php";

$sql = "SELECT * FROM articles";
$result = $conn->query($sql);

//Initialize array variable
  $data = array();

//Fetch into associative array
  while ( $row = $result->fetch_assoc())  {
	$data[]=$row;
  }

header('Content-Type: application/json');
echo json_encode($data);

$conn->close();