<?php

include '../db_connect.php';
session_start();
if (!$_SESSION["admin_loggedin"]) {
    echo "<script>alert('Only Admins Can Access This Page')</script>";
    echo "<script>window.location.href='../login.php'</script>";
}

if(isset($_POST["s1"])){
    $p_nm=$_POST["txt1"];
    $slp=$_POST["txt2"];
    $mrp=$_POST["txt3"];
    $brand=$_POST["brand"];
    $description=$_POST["desc"];
    $filename = $_FILES["img"]["name"];
    $tempname = $_FILES["img"]["tmp_name"];
    $folder = "uploads/" . $filename;

    $q="insert into products(brand_id,image,name,selling_price,mrp,description) values(".$brand.",'".$filename."','".$p_nm."',".$slp.",".$mrp.",'".$description."')";

    if(mysqli_query($conn,$q)){
        if(move_uploaded_file($tempname,$folder)){
            echo "Product Added Successfully";
        }
        else{
            echo "Image Upload Failed";
        }
    }
    else{
        echo "Product Add Failed";
    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>

<body>
    <?php include 'admin-nav.php'; ?>

    <div class="text-center my-3 text-primary">
        <h1><u>Product Manager</u></h1>
    </div>
    <form method="post" enctype="multipart/form-data">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h4>Product Name:-</h4>
                <input type="text" class="form-control" name="txt1">
            </div>
            <div class="col-6">
                <h4>Selling Price:-</h4>
                <input type="text" class="form-control" name="txt2">
            </div>
        </div>
        <div class="row my-4">
            <div class="col-6">
                <h4>MRP:-</h4>
                <input type="text" class="form-control" name="txt3">
            </div>
            <div class="col-6">
                <h4>Brand:-</h4>
                <select name="brand" class="form-select">
                    <?php 

                    $sql="select * from brands"; 
                    $result=mysqli_query($conn,$sql);
                    while($data=mysqli_fetch_assoc($result))
                    {

                    ?>

                    <option value="<?php echo $data["id"] ?>"><?php echo $data["name"] ?></option>
                    
                    <?php } ?>

                </select>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-12">
                <h4>Product Image:-</h4>
                <input type="file" class="form-control" name="img">
            </div>
        </div>
        <div class="row my-4">
            <div class="col-12">
                <h4>Description:-</h4>
                <textarea cols="150" class="form-control" rows="3" name="desc"></textarea>
            </div>
        </div>
        <div>
            <input type="submit" name="s1" class="btn btn-outline-primary" value="Add Product">
            <input type="reset" class="btn btn-outline-danger mx-3" value="Reset">
        </div>
        <div class="my-4">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Selling Price</th>
                    <th>MRP</th>
                    <th>Description</th>
                    <th>Operations</th>
                </tr>
                <?php 
            
                    $sql="select * from products";
                    $result=mysqli_query($conn,$sql);
                    while($data=mysqli_fetch_assoc($result)){

                ?>
                <tr>
                    <td><img src="uploads/<?php echo $data["image"]; ?>" width="80px" height="80px"></td>
                    <td><?php echo $data["name"]; ?></td>
                    <td><?php echo $data["selling_price"]; ?></td>
                    <td><?php echo $data["mrp"]; ?></td>
                    <td><?php echo $data["description"]; ?></td>
                    <td><a href="edit-product.php?id=<?php echo $data["id"]; ?>" class="btn btn-outline-dark">Edit</a><a href="del-product.php?id=<?php echo $data["id"]; ?>" class="btn btn-outline-danger ms-2">Delete</a></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    </form>
</body>

</html>