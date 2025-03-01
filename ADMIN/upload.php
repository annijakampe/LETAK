<?php
include '../database/db.php';

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$error_message = "";
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


$check = getimagesize($_FILES["photo"]["tmp_name"]);
if ($check !== false) {
    $uploadOk = 1;
} else {
    $error_message .= "File is not an image.<br>";
    $uploadOk = 0;
}


if (file_exists($target_file)) {
    $error_message .= "Sorry, file already exists.<br>";
    $uploadOk = 0;
}


if ($_FILES["photo"]["size"] > 500000) {
    $error_message .= "Sorry, your file is too large.<br>";
    $uploadOk = 0;
}


if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    $error_message .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
}


if ($uploadOk == 0) {
    $error_message .= "Sorry, your file was not uploaded.<br>";
} else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $filename = basename($_FILES["photo"]["name"]);
        $sql = "INSERT INTO photos (name, description, filename) VALUES ('$name', '$description', '$filename')";
        if ($conn->query($sql) === TRUE) {
            $error_message .= "The file " . htmlspecialchars(basename($_FILES["photo"]["name"])) . " has been uploaded.<br>";
        } else {
            $error_message .= "Error: " . $sql . "<br>" . $conn->error . "<br>";
        }
    } else {
        $error_message .= "Sorry, there was an error uploading your file.<br>";
    }
}

$conn->close();

if ($error_message) {
    echo $error_message;
} else {
    header("Location: admin.php");
}
