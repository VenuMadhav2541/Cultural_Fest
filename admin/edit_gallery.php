<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit();
}

include('../conn/conn.php');

// Retrieve POST data
$id = $_POST['id'];
$category = $_POST['event_category'];
$name = $_POST['event_name'];
$type = $_POST['event_type'];
$url = $_POST['event_url'];

// Handle file upload
$update_image = "";
if (!empty($_FILES["event_image"]["name"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["event_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadOk = 1;

    // Check if file is an image
    $check = getimagesize($_FILES["event_image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size (5MB max)
    if ($_FILES["event_image"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["event_image"]["tmp_name"], $target_file)) {
            $update_image = ", event_image = ?";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Prepare SQL statement
$sql = "UPDATE gallery SET event_category = ?, event_name = ?, event_type = ?, event_url = ?" . $update_image . " WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($update_image) {
    $stmt->bind_param("sssssi", $category, $name, $type, $url, $target_file, $id);
} else {
    $stmt->bind_param("ssssi", $category, $name, $type, $url, $id);
}

if ($stmt->execute()) {
    header('Location: gallery.php');
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
