<?php
include "db.php";

$action=$_POST['action'];

if($action=="add"){
mysqli_query($conn,
"INSERT INTO events(title,event_date,venue)
VALUES('$_POST[title]','$_POST[date]','$_POST[venue]')");
}

if($action=="list"){
$r=mysqli_query($conn,"SELECT * FROM events");
$data=[];
while($row=mysqli_fetch_assoc($r)){
$data[]=$row;
}
echo json_encode($data);
}
?>