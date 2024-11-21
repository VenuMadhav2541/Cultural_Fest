<?php
include('../conn/conn.php');
$id = $_GET['id'];
$sql = "SELECT * FROM registration WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$registration = $result->fetch_assoc();
echo json_encode($registration);
$conn->close();
?>
