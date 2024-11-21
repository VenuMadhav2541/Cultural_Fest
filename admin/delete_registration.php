<?php
include('../conn/conn.php');

$id = $_POST['id'];
$sql = "DELETE FROM registration WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$conn->close();
?>
