<?php
include "db.php";

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

$q="INSERT INTO students(name,email,password)
VALUES('$name','$email','$password')";

if(mysqli_query($conn,$q)){
echo "success";
}else{
echo "error";
}
?>