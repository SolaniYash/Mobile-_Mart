<?php 

session_start();
include 'db_connect.php';

if(!$_SESSION["loggedin"]){
    echo "<script>alert('Please Log In First')</script>";
    echo "<script>window.location.href='login.php'</script>";
}

$pid=$_GET["pid"];

$sql="delete from cart where pid=".$pid;

$result=mysqli_query($conn,$sql) or die("Error");

header("Location: cart.php");


?>