<?php
include('../conn/conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_id = $_POST['event_id'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_location = $_POST['event_location'];
    $event_image = '';

    if (isset($_FILES['event_image']) && $_FILES['event_image']['error'] == 0) {
        $upload_dir = '../uploads/';
        $filename = basename($_FILES['event_image']['name']);
        $target_file = $upload_dir . $filename;
        if (move_uploaded_file($_FILES['event_image']['tmp_name'], $target_file)) {
            $event_image = $target_file;
        }
    }

    if ($event_image) {
        $sql = "UPDATE events SET event_name='$event_name', event_date='$event_date', event_location='$event_location', event_image='$event_image' WHERE event_id='$event_id'";
    } else {
        $sql = "UPDATE events SET event_name='$event_name', event_date='$event_date', event_location='$event_location' WHERE event_id='$event_id'";
    }

    if ($conn->query($sql) === TRUE) {
        header('Location: events.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
