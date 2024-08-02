<?php

session_start();
include './db_connect.php';

if(!$_SESSION["loggedin"]){
    echo "<script>alert('Please Log In First')</script>";
    echo "<script>window.location.href='login.php'</script>";
}

$pid = $_GET["id"];
$sql = "select pid from cart where uid=" . $_SESSION["uid"];
$result = mysqli_query($conn, $sql);
$column_array = array();


while ($row = mysqli_fetch_assoc($result)) {
    $column_array = $row;
}

if (in_array($pid, $column_array)) {
    echo "<script>alert('Product Is Already Added To Cart')</script>";
    echo "<script>window.location.href='index.php'</script>";
} else {
    $q="select * from products where id=".$pid;
    $query=mysqli_query($conn,$q);
    while($data=mysqli_fetch_assoc($query)){
        $image=$data["image"];
        $name=$data["name"];
        $slp=$data["selling_price"];
    }
    $uid = $_SESSION["uid"];
    $pid = $_GET["id"];
    $qty = 1;

    $q = "insert into cart(uid,pid,image,name,price,qty) values(" . $uid . "," . $pid . ",'" . $image . "','" . $name . "'," . $slp . "," . $qty . ")";
    if (mysqli_query($conn, $q)) {
        echo "<script>alert('Product Added To Cart Successfully')</script>";
        echo "<script>window.location.href='cart.php'</script>";
    } else {
        echo "<script>alert('Error')<script>";
    }
}
