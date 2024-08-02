<?php

include '../db_connect.php';
session_start();
if (!$_SESSION["admin_loggedin"]) {
    echo "<script>alert('plese login first')</script>";
    echo "<script>window.location.href='../login.php'</script>";
}

$id=$_GET["id"];

$sql="delete from orders where id=".$id;

$result=mysqli_query($conn,$sql) or die("Error");

header("Location: orders.php");

?>