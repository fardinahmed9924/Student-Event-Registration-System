<?php
include "db.php";

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO students (name, email, password)
            VALUES ('$name', '$email', '$password')";

    if(mysqli_query($conn, $sql)){
        header("Location: student_login.php");
    }
}
?>

<!DOCTYPE html>
<html>
<body>
<h2>Student Registration</h2>

<form method="post">
Name: <input type="text" name="name" required><br><br>
Email: <input type="email" name="email" required><br><br>
Password: <input type="password" name="password" required><br><br>
<button name="register">Register</button>
</form>

<a href="student_login.php">Back to Login</a>
</body>
</html>