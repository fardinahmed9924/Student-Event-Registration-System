<?php
include "db.php";

$result = $conn->query("SELECT * FROM events");

$events = array();

while($row = $result->fetch_assoc()){
    $events[] = $row;
}

echo json_encode($events);
?>