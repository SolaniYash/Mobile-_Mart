<?php

include '../db_connect.php';
session_start();
if (!$_SESSION["admin_loggedin"]) {
    echo "<script>alert('Only Admins Can Access This Page')</script>";
    echo "<script>window.location.href='../login.php'</script>";
}

$id = $_GET["id"];

$q = "select * from products where id=" . $id;

$results = mysqli_query($conn, $q);

if (isset($_POST['del-img'])) {
    $blank = "";
    $sql = "update products set image='{$blank}' where id={$id}";
    $result = mysqli_query($conn, $sql) or die("Error");
}

if (isset($_POST["s1"])) {
    $name = $_POST["txt1"];
    $slp = $_POST["txt2"];
    $mrp = $_POST["txt3"];
    $brand = $_POST["brand"];
    $desc = $_POST["desc"];
    $id = $_GET["id"];
    $q = "select * from products where id=" . $id;
    $result = mysqli_query($conn, $q);
    $data = mysqli_fetch_assoc($result);
    if (!empty($data["image"])) {
        $q = "update products set name='" . $name . "',selling_price=" . $slp . ",mrp=" . $mrp . ",brand_id=" . $brand . ",description='" . $desc . "' where id=" . $id;
        $result = mysqli_query($conn, $q);
        echo "<script>alert('Product Updated Successfully')</script>";
        echo "<script>window.location.href='products.php'</script>";
    } else {
        $name = $_POST["txt1"];
        $slp = $_POST["txt2"];
        $mrp = $_POST["txt3"];
        $brand = $_POST["brand"];
        $desc = $_POST["desc"];
        $id = $_GET["id"];
        $filename=$_FILES["img"]["name"];
        $tempname=$_FILES["img"]["tmp_name"];
        $folders ="uploads/".$filename;
        if(move_uploaded_file($tempname,$folders)){
            $q="update products set name='".$name."',selling_price=".$slp.",mrp=".$mrp.",brand_id=".$brand.",image='".$filename."',description='".$desc."' where id=".$id."   ";
            $result=mysqli_query($conn,$q);
            echo "<script>alert('Product Updated Successfully')</script>";
            echo "<script>window.location.href='products.php'</script>";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>

<body>
    <?php include 'admin-nav.php'; ?>

    <div class="text-center my-3 text-primary">
        <h1><u>Edit Product</u></h1>
    </div>
    <form method="post" enctype="multipart/form-data">
        <div class="container">
            <?php
            while ($data = mysqli_fetch_assoc($results)) {
            ?>
                <div class="row">
                    <div class="col-6">
                        <h4>Product Name:-</h4>
                        <input type="text" class="form-control" value="<?php echo $data["name"]; ?>" name="txt1">
                    </div>
                    <div class="col-6">
                        <h4>Selling Price:-</h4>
                        <input type="text" class="form-control" value="<?php echo $data["selling_price"]; ?>" name="txt2">
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-6">
                        <h4>MRP:-</h4>
                        <input type="text" class="form-control" value="<?php echo $data["mrp"]; ?>" name="txt3">
                    </div>
                    <div class="col-6">
                        <h4>Brand:-</h4>
                        <select name="brand" class="form-select">
                            <?php

                            $sql = "select * from brands";
                            $result = mysqli_query($conn, $sql);
                            while ($data = mysqli_fetch_assoc($result)) {

                            ?>

                                <option value="<?php echo $data["id"] ?>"><?php echo $data["name"] ?></option>

                            <?php } ?>

                        </select>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-12">
                        <?php
                        $id = $_GET["id"];
                        $q = "select * from products where id=" . $id;
                        $result = mysqli_query($conn, $q);
                        while ($data = mysqli_fetch_assoc($result)) {;
                        ?>
                            <h4>Product Image:-</h4>
                            <?php if (!empty($data["image"])) { ?>
                                <img src="uploads/<?php echo $data["image"]; ?>" width="80px" height="80px"><br>
                                <input type="submit" name="del-img" value="Delete" class="btn btn-danger">
                            <?php } else {  ?>
                                <input type="file" class="form-control" name="img">
                            <?php } ?>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-12">
                        <h4>Description:-</h4>
                        <textarea cols="150" class="form-control" rows="3" name="desc"><?php echo $data["description"]; ?></textarea>
                    <?php } ?>
                    </div>
                </div>
                <div>
                    <input type="submit" name="s1" class="btn btn-outline-primary" value="Update Product">
                    <input type="reset" class="btn btn-outline-danger mx-3" value="Reset">
                </div>
            <?php } ?>
        </div>
</body>

</html>