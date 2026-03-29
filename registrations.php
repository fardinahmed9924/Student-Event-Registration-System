<?php
session_start();
include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>All Registrations</title>

<style>
body{
font-family:Arial;
padding:20px;
background:#f4f4f4;
margin:0;
display:flex;
flex-direction:column;
min-height:100vh;
}

table{
width:100%;
border-collapse:collapse;
background:white;
}

th,td{
border:1px solid #ccc;
padding:10px;
text-align:center;
}

th{
background:#007bff;
color:white;
}

/* FOOTER */
footer{
background:#007bff;
color:white;
text-align:center;
padding:12px;
margin-top:auto;
font-size:14px;
}
</style>
</head>

<body>

<h2>Registered Students With Event Details</h2>

<table>
<tr>
<th>Student Name</th>
<th>Event Title</th>
<th>Date</th>
<th>Venue</th>
</tr>

<?php

$sql = "SELECT registrations.student_name,
               events.title,
               events.event_date,
               events.venue
        FROM registrations
        INNER JOIN events
        ON registrations.event_id = events.event_id";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    echo "<tr>
            <td>".$row['student_name']."</td>
            <td>".$row['title']."</td>
            <td>".$row['event_date']."</td>
            <td>".$row['venue']."</td>
          </tr>";
}

?>

</table>

<footer>
© 2026 Student Event Registration System. All rights reserved.
</footer>

</body>
</html>