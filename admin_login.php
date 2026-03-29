<?php
session_start();

if(isset($_POST['login'])){
    if($_POST['email']=="admin@gmail.com" && $_POST['password']=="admin123"){
        $_SESSION['admin']=true;
        header("Location: admin_dashboard.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Login - Student Event System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
:root{
--bg:#f4f4f4;
--card:#ffffff;
--text:#000;
--btn:#007bff;
}
body.dark{
--bg:#121212;
--card:#1f1f1f;
--text:#fff;
--btn:#0d6efd;
}

body{
margin:0;
font-family:Arial, sans-serif;
background:var(--bg);
color:var(--text);
display:flex;
justify-content:center;
align-items:center;
height:100vh;
}

.login-box{
background:var(--card);
padding:25px;
width:100%;
max-width:350px;
border-radius:8px;
box-shadow:0 0 10px rgba(0,0,0,0.2);
}

h2{text-align:center;}

input{
width:100%;
padding:10px;
margin:10px 0;
border-radius:5px;
border:1px solid #ccc;
}

button{
width:100%;
padding:10px;
background:var(--btn);
color:#fff;
border:none;
border-radius:5px;
cursor:pointer;
}

.theme-btn{
margin-top:10px;
background:gray;
}

.error{
color:red;
text-align:center;
}
</style>
</head>

<body>

<div class="login-box">
<h2>Admin Login</h2>

<input type="email" id="email" placeholder="Admin Email">
<input type="password" id="password" placeholder="Admin Password">

<div class="error" id="error"></div>

<button onclick="adminLogin()">Login</button>
<button class="theme-btn" onclick="toggleTheme()">Light / Dark</button>
</div>

<script>
/* LOAD THEME */
if(localStorage.getItem("theme")==="dark"){
document.body.classList.add("dark");
}

function toggleTheme(){
document.body.classList.toggle("dark");
localStorage.setItem(
"theme",
document.body.classList.contains("dark")?"dark":"light"
);
}

/* ADMIN LOGIN */
function adminLogin(){
let email=document.getElementById("email").value;
let password=document.getElementById("password").value;
let error=document.getElementById("error");

/* DEMO ADMIN CREDENTIALS */
if(email==="admin@gmail.com" && password==="admin123"){
localStorage.setItem("adminLoggedIn","true");
window.location.href="admin_dashboard.html";
}else{
error.innerText="Invalid Admin Credentials";
}
}
</script>

</body>
</html>
