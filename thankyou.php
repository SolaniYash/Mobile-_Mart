<?php

include 'db_connect.php';

session_start();

if (!$_SESSION["loggedin"]) {
    echo "<script>alert('plese login first')</script>";
    echo "<script>window.location.href='login.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You!</title>
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="container">

        <div class="text-center my-5">
            <img src="./icons/icons8-thank-you-100.png" height="150px" width="150px">
        </div>

        <div class="row text-center text-primary">
            <h1>Your order has been successfully placed.</h1>
        </div>

        <div class="display-6 text-center">
            Thank You 
            <?php
            $sql="select * from users where id=".$_SESSION["uid"];
            $result=mysqli_query($conn,$sql);
            while($data=mysqli_fetch_assoc($result)){
                echo $data["name"];
            }
            ?>, For Shopping With Us.
        </div>

        <div class="text-center my-3">
            <a href="index.php" class="btn btn-primary mx-3">Continue Shopping</a>
            <a href="orders.php" class="btn btn-success">Show My Orders</a>
        </div>

    </div>
</body>
<?php include 'footer.php'; ?>
</html>