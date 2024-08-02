<?php

$editMode=false;

include 'db_connect.php';
session_start();

if(!$_SESSION["loggedin"]){
    echo "<script>alert('Please Log In First')</script>";
    echo "<script>window.location.href='login.php'</script>";
}

if(isset($_POST["updateQty"])){
    $qty=$_POST["qty"];
    $pid=$_POST["pid"];

    $sql="update cart set qty=".$qty." where pid=".$pid." and uid=".$_SESSION["uid"];

    $result=mysqli_query($conn,$sql);

    header("Location: cart.php");

}

if(isset($_GET["pid"])){
    $editMode=true;
}

if(isset($_POST["cancel"])){
    header("Location: cart.php");
}


if(isset($_POST["delProd"])){
    echo $_POST["pid"];
    echo "Delete CLicked";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container my-5">

        <div class="row text-primary">
            <h1>Shopping Cart</h1>
        </div>

        <div class="row my-3">

            <div class="col-10">

                <table class="table text-center table-striped table-bordered">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Operations</th>
                    </tr>
                    <?php 
                    $sql="select * from cart where uid=".$_SESSION["uid"];
                    $result=mysqli_query($conn,$sql);
                    while($data=mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><img src="./admin/uploads/<?php echo $data["image"]; ?>" height="40px" width="40px"></td>
                        <td><?php echo $data["name"]; ?></td>
                        <td><?php echo "₹".$data["price"]; ?></td>
                        <td>
                            <?php if($editMode==true && $data["pid"]==$_GET["pid"])  { ?>
                                <form method="post">
                                <input type="number" name="qty" min="1" max="10"  value="<?php echo $data["qty"] ?>">
                                <?php } else { ?>
                                    <?php echo $data["qty"]; ?>
                            <?php } ?>
                        </td>
                        <td><?php echo "₹".$data["price"]*$data["qty"]; ?></td>
                        <td>
                                <input type="hidden" name="pid" value="<?php echo $data["pid"]; ?>">
                                <?php if($editMode && $data["pid"]==$_GET["pid"]) { ?>
                                    <input type="submit" value="Update" name="updateQty" class="btn btn-primary ms-2">
                                    <input type="submit" value="Cancel" name="cancel" class="btn btn-dark">
                                    <?php } else { ?>
                                        <a href="cart.php?pid=<?php echo $data["pid"]; ?>" class="btn btn-primary">Edit</a>
                                        <a href="del-cart-product.php?pid=<?php echo $data["pid"]; ?>" class="btn btn-danger">Delete</a>
                                <?php } ?>
                            </form>    
                        </td>
                    </tr>
                    <?php
                    $grand_total += $data["price"]*$data["qty"]; 
                    $_SESSION["total_price"]=$grand_total;
                    ?>
                    <?php } ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Grand Total:-</td>
                        <td><?php echo "₹".$grand_total; ?></td>
                        <td></td>
                    </tr>
                </table>

            </div>

        </div>

        <div >
            <a href="index.php" class="btn btn-outline-primary mx-3">Continue Shopping</a>
            <a href="checkout.php" class="btn btn-outline-success">Proceed To Checkout</a>
        </div>

    </div>

</body>
<?php include 'footer.php'; ?>
</html>