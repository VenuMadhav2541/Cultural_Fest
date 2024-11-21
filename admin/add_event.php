<?php
include('../conn/conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_location = $_POST['event_location'];
    $event_image = '';

    if (isset($_FILES['event_image']) && $_FILES['event_image']['error'] == 0) {
        $upload_dir = '../images1/';
        $filename = basename($_FILES['event_image']['name']);
        $target_file = $upload_dir . $filename;
        if (move_uploaded_file($_FILES['event_image']['tmp_name'], $target_file)) {
            $event_image = $target_file;
        }
    }
    $event_image = str_replace("../", "./", $event_image);
    $sql = "INSERT INTO events (event_name, event_date, event_location, event_image) VALUES ('$event_name', '$event_date', '$event_location', '$event_image')";
    if ($conn->query($sql) === TRUE) {
        header('Location: events.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
