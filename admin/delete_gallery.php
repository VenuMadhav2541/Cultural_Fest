<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit();
}

include('../conn/conn.php');

// Retrieve POST data
$id = $_POST['id'];

// Prepare SQL statement
$sql = "DELETE FROM gallery WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header('Location: gallery.php');
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
