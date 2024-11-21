<?php
include('../conn/conn.php');
$id = $_POST['id'];

$sql = "DELETE FROM issues WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo 'Issue deleted successfully.';
} else {
    echo 'Failed to delete issue.';
}

$stmt->close();
$conn->close();
?>
