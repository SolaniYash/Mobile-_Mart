<?php

include '../db_connect.php';
session_start();
if (!$_SESSION["admin_loggedin"]) {
    echo "<script>alert('Only Admins Can Access This Page')</script>";
    echo "<script>window.location.href='../login.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <?php include 'admin-nav.php'; ?>

    <!--Cards Started-->
    <div class="container my-3">
        <div class="row mb-2">
            <div class="col-md-6 accordion">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-0 text-center">Total No. Of Users:-</h3>
                        <div class="text-center display-1">
                            <?php
                            $sql = "select * from users";
                            $results = mysqli_query($conn, $sql);
                            $user_no = mysqli_num_rows($results);
                            echo $user_no;
                            ?>
                        </div>
                    </div>
                    <div class="col-auto  ms-3 d-none d-lg-block">
                    </div>
                </div>
            </div>
            <div class="col-md-6 accordion">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-0 text-center">Total No. Of Brands:-</h3>
                        <div class="text-center display-1">
                            <?php
                            $sql = "select * from brands";
                            $results = mysqli_query($conn, $sql);
                            $brand_no = mysqli_num_rows($results);
                            echo $brand_no;
                            ?>
                        </div>
                    </div>
                    <div class="col-auto  ms-3 d-none d-lg-block">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-6 accordion">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-0 text-center">Total No. Of Products:-</h3>
                        <div class="text-center display-1">
                            <?php
                            $sql = "select * from products";
                            $results = mysqli_query($conn, $sql);
                            $product_no = mysqli_num_rows($results);
                            echo $product_no;
                            ?>
                        </div>
                    </div>
                    <div class="col-auto  ms-3 d-none d-lg-block">
                    </div>
                </div>
            </div>
            <div class="col-md-6 accordion">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <h3 class="mb-0 text-center">Total No. Of Orders:-</h3>
                        <div class="text-center display-1">
                        <?php
                            $sql = "select * from orders";
                            $results = mysqli_query($conn, $sql);
                            $order_no = mysqli_num_rows($results);
                            echo $order_no;
                            ?>
                        </div>
                    </div>
                    <div class="col-auto  ms-3 d-none d-lg-block">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cards Ended-->
</body>

</html>