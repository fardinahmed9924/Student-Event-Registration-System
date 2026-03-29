<?php
session_start();

if(isset($_POST['student_name'])){
    $_SESSION['student'] = $_POST['student_name'];
    header("Location: student_dashboard.php");
}
?>