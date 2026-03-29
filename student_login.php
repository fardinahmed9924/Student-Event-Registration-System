<?php
session_start();
include "db.php";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // ADMIN LOGIN
    if($email=="admin@gmail.com" && $password=="admin123"){
        $_SESSION['admin'] = true;
        header("Location: admin_dashboard.php");
        exit;
    }

    // STUDENT LOGIN
    $sql = "SELECT * FROM students WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)==1){
        $_SESSION['student'] = true;
        header("Location: student_dashboard.php");
    } else {
        echo "Invalid Login";
    }
}
?>

<!DOCTYPE html>
<html>
<body>
<h2>Login</h2>

<form method="post">
Email: <input type="email" name="email"><br><br>
Password: <input type="password" name="password"><br><br>
<button name="login">Login</button>
</form>

<a href="student_register.php">New User?</a>
</body>
</html>