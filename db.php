<?php
$conn = new mysqli("localhost", "root", "", "student_event_db");

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
?>