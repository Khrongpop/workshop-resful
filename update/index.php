<?php
 @include "../db.php";
  $id = $_POST["id"];
  $title = $_POST["title"];
  $detail = $_POST["detail"];

  $sql = "UPDATE articles SET title = '$title' , detail = '$detail' WHERE id = $id";
  

	if ($conn->query($sql) === TRUE) {
		echo "Update record successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

$conn->close();