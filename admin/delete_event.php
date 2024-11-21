<?php
include('../conn/conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_id = $_POST['event_id'];

    $sql = "DELETE FROM events WHERE event_id='$event_id'";
    if ($conn->query($sql) === TRUE) {
        header('Location: events.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
