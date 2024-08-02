<?php

include '../db_connect.php';
session_start();
if(!$_SESSION["admin_loggedin"]){
    echo "<script>alert('Only Admins Can Access This Page')</script>";
    echo "<script>window.location.href='../login.php'</script>";
}

$id=$_GET["id"];

$q="delete from products where id=".$id;

mysqli_query($conn,$q) or die("Error");

header("Location: products.php");

?>