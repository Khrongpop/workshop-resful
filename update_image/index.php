<?php
@include "../db.php";
$target_dir = "../images/";
$image = $_FILES["image"]["name"];
$image_name = basename($image);
$target_file = $target_dir . $image_name;
$uploadOk = 1; //
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //

$check = getimagesize($_FILES["image"]["tmp_name"]);
if ($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
} else {
    echo json_encode(['message' => "File is not an image."]);
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo json_encode(['message' => "Sorry, your file was not uploaded."]);
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // echo "The file " . $image_name . " has been uploaded.";
        // echo json_encode(['message' => "Uploade Image Successfully"]);

        $image_path = "/images/" . $image_name;
        $id = $_POST["id"];
        $title = $_POST["title"];
        $detail = $_POST["detail"];

        $sql = "UPDATE articles SET title = '$title' , detail = '$detail' , image = '$image_path' WHERE id = $id";

        if ($conn->query($sql) === true) {
            echo json_encode(['message' => "Update Article Successfully", 'image' => $image_path]);
        } else {
            echo json_encode(['message' => "Error: " . $conn->error]);
        }

        $conn->close();

    } else {
        echo json_encode(['message' => "Sorry, there was an error uploading your file."]);
    }
}
