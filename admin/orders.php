<?php

include '../db_connect.php';
session_start();
$accordionFixer=0;
if (!$_SESSION["admin_loggedin"]) {
    echo "<script>alert('plese login first')</script>";
    echo "<script>window.location.href='../login.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
</head>

<body>
    <?php include 'admin-nav.php'; ?>

    <div class="container">

        <div class="text-center text-primary my-3">
            <h1>All Orders</h1>
        </div>

        <?php

        $sql = "select * from orders";
        $result = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_assoc($result)) {
        $accordionFixer++;
        ?>

            <div class="card my-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-11">
                            Order Id : <?php echo $data["id"]; ?>
                        </div>
                        <div class="col-1">
                            <a href="del-orders.php?id=<?php echo $data["id"] ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5>Order Details</h5>

                    <table class="table table-striped table-bordered text-center">
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                        <?php
                        $sql2 = "select * from order_details where order_id=" . $data["id"] ;
                        $result2 = mysqli_query($conn, $sql2);
                        while ($row = mysqli_fetch_assoc($result2)) {
                        ?>
                            <tr>
                                <td><img src="./uploads/<?php echo $row["image"]; ?>" height="50px" width="50px"></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo "₹" . $row["price"]; ?></td>
                                <td><?php echo $row["qty"]; ?></td>
                                <td><?php echo "₹" . $row["price"] * $row["qty"]; ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Grand Total : </td>
                            <td><?php echo "₹" . $data["total_price"]; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="accordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-<?php echo $accordionFixer; ?>" aria-expanded="false" aria-controls="panelsStayOpen-<?php echo $accordionFixer; ?>">
                                More Information
                            </button>
                        </h2>
                        <div id="panelsStayOpen-<?php echo $accordionFixer; ?>" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h5><b>Shipping Address</b></h5>
                                        <p>
                                            Name: <?php echo $data["full_name"]; ?><br>
                                            Email: <?php echo $data["email"]; ?><br>
                                            Phno: <?php echo $data["phno"]; ?><br>
                                            Address: <?php echo $data["address"]; ?><br>
                                            Zip: <?php echo $data["zip"]; ?><br>
                                            State: <?php echo $data["state"]; ?><br>
                                            Country: <?php echo $data["country"]; ?>
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <h5><b>Pricing Information</b></h5>
                                        <p>
                                            Pay Mode: Cash On Delivery<br>
                                            Date: <?php echo $data["date"]; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

    </div>
</body>

</html>