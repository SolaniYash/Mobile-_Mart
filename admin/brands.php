<?php

include '../db_connect.php';
session_start();
if(!$_SESSION["admin_loggedin"]){
    echo "<script>alert('Only Admins Can Access This Page')</script>";
    echo "<script>window.location.href='../login.php'</script>";
}

if(isset($_POST["s1"])){
    $brand=$_POST["txt1"];

    $q="insert into brands(name) values('".$brand."')";

    if(mysqli_query($conn,$q)){
        echo "<script>alert('Brand Added Successfully')</script>";
    }
    else{
        echo "Error";
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brands</title>
</head>
<body>
    <?php include 'admin-nav.php'; ?>

    <div class="text-center my-3 text-primary">
        <h1><u>Brand Manager</u></h1>
    </div>

    <div class="container">
        <form method="post">
            <h4>Enter Brand Name:-</h4>
            <input type="text" class="form-control form-control-lg" name="txt1" required><br>
            <input type="submit" name="s1" class="btn btn-outline-primary">
        </form>

        <table class="table table-striped table-bordered text-center my-4">
            <tr>
                <th>Id</th>
                <th>Brand Name</th>
                <th>Operation</th>
            </tr>
            <?php 
            
            $sql="select * from brands";
            $result=mysqli_query($conn,$sql);
            while($data=mysqli_fetch_assoc($result)){

            ?>

                <tr>
                    <td><?php echo $data["id"] ?></td>
                    <td><?php echo $data["name"] ?></td>
                    <td><a href="del-brand.php?id=<?php echo $data["id"]; ?>" class="btn btn-outline-danger">Delete</a></td>
                </tr>

            <?php } ?>
        </table>

    </div>



</body>
</html>