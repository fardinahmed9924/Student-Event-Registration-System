<?php
session_start();
if(!isset($_SESSION['admin'])){
header("Location: admin_login.html");
exit;
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Admin Dashboard</h2>
<a href="logout.php">Logout</a>

<h3>Add Event</h3>
<input type="text" id="eventName" placeholder="Title">
<input type="date" id="eventDate">
<input type="text" id="eventVenue" placeholder="Venue">
<button onclick="addEvent()">Add</button>

<h3>All Events</h3>
<table border="1">
<thead>
<tr>
<th>ID</th>
<th>Title</th>
<th>Date</th>
<th>Venue</th>
</tr>
</thead>
<tbody id="eventTable"></tbody>
</table>

<script>
function addEvent(){
let f=new FormData();
f.append("action","add");
f.append("title",eventName.value);
f.append("date",eventDate.value);
f.append("venue",eventVenue.value);

fetch("event_api.php",{method:"POST",body:f})
.then(()=>loadEvents());
}

function loadEvents(){
let f=new FormData();
f.append("action","list");

fetch("event_api.php",{method:"POST",body:f})
.then(r=>r.json())
.then(data=>{
let rows="";
data.forEach(e=>{
rows+=`<tr>
<td>${e.event_id}</td>
<td>${e.title}</td>
<td>${e.event_date}</td>
<td>${e.venue}</td>
</tr>`;
});
eventTable.innerHTML=rows;
});
}

loadEvents();
</script>

</body>
</html>