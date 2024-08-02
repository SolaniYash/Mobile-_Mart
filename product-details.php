<?php

session_start();
include './db_connect.php';
$pid=$_GET["id"];
if(isset($_POST["s1"])){
    $sql="select pid from cart where uid=".$_SESSION["uid"];
    $result=mysqli_query($conn,$sql);
    $column_array = array();
    while($row=mysqli_fetch_assoc($result)){
        $column_array=$row;
    }

    if(in_array($pid,$column_array)){
        echo "<script>alert('Product Is Already Added To Cart')</script>";
    }
    else{
        $uid=$_SESSION["uid"];
        $pid=$_POST["pid"];
        $image=$_POST["img"];
        $name=$_POST["name"];
        $slp=$_POST["slp"];
        $qty=$_POST["qty"];

        $q="insert into cart(uid,pid,image,name,price,qty) values(".$uid.",".$pid.",'".$image."','".$name."',".$slp.",".$qty.")";
        if(mysqli_query($conn,$q)){
            echo "<script>alert('Product Added To Cart Successfully')</script>";
            echo "<script>window.location.href='cart.php'</script>";
        }
        else{
            echo "<script>alert('Error')<script>";
        }


    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="text-center my-3 text-decoration-underline text-primary">
        <h1>Product Details</h1>
    </div>
    <div class="container">
        <?php
        $id=$_GET["id"];
        $sql="select * from products where id=".$id;
        $result=mysqli_query($conn,$sql);
        while($data=mysqli_fetch_assoc($result))
        {
        ?>

        <div class="row">

            <div class="col-6">
                <img src="./admin/uploads/<?php echo $data["image"]; ?>" height="500px" width="500px">
            </div>

            <div class="col-6 my-5">
                <h3><?php echo $data["name"]; ?></h3>
                <h5><b>₹<?php echo $data["selling_price"]; ?></b></h5>
                <h5><s>₹<?php echo $data["mrp"]; ?></s></h5>
                <p><?php echo $data["description"]; ?></p><br>
                <h6>Quantity:-</h6>
                <form method="post">
                <select name="qty" class="form-select-sm">
                    <?php for ($i=1; $i <= 10 ; $i++) { ?>
                        <option><?php echo $i; ?></option>    
                    <?php } ?>
                </select>
                <br><br>
                <?php
                if($_SESSION["loggedin"]) { ?>
                        <?php
                            $pid=$_GET["id"];
                            $sql="select * from products where id=".$pid;
                            $result=mysqli_query($conn,$sql);
                            while($data=mysqli_fetch_assoc($result)) {
                        ?>

                        <input type="hidden" name="pid" value="<?php echo $data["id"]; ?>">
                        <input type="hidden" name="img" value="<?php echo $data["image"]; ?>">
                        <input type="hidden" name="name" value="<?php echo $data["name"]; ?>">
                        <input type="hidden" name="slp" value="<?php echo $data["selling_price"]; ?>">


                        <?php } ?>
                   <input type="submit" value="Add To Cart" name="s1" class="btn btn-primary"> 
                    </form>
            <?php  } else { ?>
                    <button class="btn" onclick="alert('Please Log In')"><a href="login.php" class="btn btn-primary">Add To Cart</a></button>
            <?php } ?>
            </div>

        </div>

        <?php } ?>
        

    </div>
</body>
<?php include 'footer.php'; ?>
</html>