<?php
include('../conn/conn.php');
$id = $_GET['id'];

$sql = "SELECT * FROM issues WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$issue = $result->fetch_assoc();

echo json_encode($issue);

$stmt->close();
$conn->close();
?>
