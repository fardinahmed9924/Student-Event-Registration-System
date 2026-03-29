<?php
session_start();
if(!isset($_SESSION['student'])){
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>View Events</title>
<style>
body{font-family:Arial;padding:20px;background:#f4f4f4;}
table{width:100%;border-collapse:collapse;background:white;}
th,td{border:1px solid #ccc;padding:10px;text-align:center;}
th{background:#007bff;color:white;}
button{padding:5px 10px;background:#28a745;color:white;border:none;}
button:hover{background:#218838;}
</style>
</head>
<body>

<h2>Available Events</h2>

<table>
<thead>
<tr>
<th>Title</th>
<th>Date</th>
<th>Venue</th>
<th>Action</th>
</tr>
</thead>

<tbody id="eventTable">
</tbody>
</table>

<script>

function loadEvents(){
fetch("get_events.php")
.then(res => res.json())
.then(data => {

let rows = "";

data.forEach(event => {

rows += `
<tr>
<td>${event.title}</td>
<td>${event.event_date}</td>
<td>${event.venue}</td>
<td>
<button onclick="joinEvent(${event.event_id})">Join</button>
</td>
</tr>
`;

});

document.getElementById("eventTable").innerHTML = rows;

});
}

function joinEvent(id){

let formData = new FormData();
formData.append("event_id", id);

fetch("join_event.php", {
method: "POST",
body: formData
})
.then(res => res.text())
.then(msg => {
alert(msg);
});

}

loadEvents();

</script>

</body>
</html>