<?php
include('../conn/conn.php');

if (isset($_GET['id'])) {
    $event_id = $_GET['id'];

    $sql = "SELECT * FROM events WHERE event_id='$event_id'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode([]);
    }

    $conn->close();
}
?>
