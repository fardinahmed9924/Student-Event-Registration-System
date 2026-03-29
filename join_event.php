<?php
session_start();
include "db.php";

if(!isset($_SESSION['student'])){
    echo "Please login first";
    exit;
}

$event_id = $_POST['event_id'];
$student_name = $_SESSION['student'];

/* Get event details */
$event_query = "SELECT * FROM events WHERE event_id='$event_id'";
$event_result = $conn->query($event_query);
$event = $event_result->fetch_assoc();

$event_title = $event['title'];
$event_date  = $event['event_date'];
$venue       = $event['venue'];

/* Insert into registrations */
$sql = "INSERT INTO registrations 
        (event_id, student_name, event_title, event_date, venue)
        VALUES 
        ('$event_id', '$student_name', '$event_title', '$event_date', '$venue')";

if($conn->query($sql)){
    echo "Successfully Joined!";
}else{
    echo "Error: " . $conn->error;
}
?>