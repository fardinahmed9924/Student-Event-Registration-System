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
<title>Student Dashboard</title>
<style>
body{font-family:Arial;margin:0;}
header{background:#007bff;color:white;padding:10px;}
.sidebar{
width:200px;
background:#f4f4f4;
height:100vh;
float:left;
padding-top:20px;
}
.sidebar a{
display:block;
padding:10px;
text-decoration:none;
color:black;
}
.sidebar a:hover{
background:#007bff;
color:white;
}
.content{
margin-left:200px;
padding:20px;
}
</style>
</head>
<body>

<header>
Welcome, <?php echo $_SESSION['student']; ?> |
<a href="logout.php" style="color:white;">Logout</a>
</header>

<div class="sidebar">
<a href="student_dashboard.php">Dashboard</a>
<a href="view_events.php">View Events</a>
</div>

<div class="content">
<h2>Dashboard</h2>
<p>Welcome to Student Event Registration System</p>
</div>

</body>
</html>