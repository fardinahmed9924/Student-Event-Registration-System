<?php
session_start();
include "db.php";

$event_id=$_POST['event_id'];
$email=$_SESSION['student'];

mysqli_query($conn,
"INSERT INTO event_registrations(student_email,event_id)
VALUES('$email','$event_id')");

echo "Joined Successfully";
?>