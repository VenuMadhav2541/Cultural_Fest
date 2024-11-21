<?php
include('../conn/conn.php');

$id = $_POST['id'];
$regd_no = $_POST['regd_no'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$event_registered = $_POST['event_registered'];
$registration_date = $_POST['registration_date'];

$sql = "UPDATE registration SET regd_no=?, name=?, email=?, phone=?, event_registered=?, registration_date=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssi", $regd_no, $name, $email, $phone, $event_registered, $registration_date, $id);
$stmt->execute();
$conn->close();

header('Location: registrations.php');
?>
