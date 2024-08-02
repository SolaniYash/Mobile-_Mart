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
    <title>Document</title>
</head>
<body>
    <?php include "admin-nav.php"; ?>
    <div class="text-center text-primary my-2">
    <h2><u>User Manager</u></h2>
    </div>
    <div class="container">
        <table class="table table-striped table-bordered">
            <tr>
                <th>Id</th>
                <th>Full name</th>
                <th>User name</th>
                <th>Password</th>
                <th>Email</th>
                <th>phno</th>
                <th>operations</th>

            </tr>
            <?php
                $sql="select * from users";
                $result=mysqli_query($conn,$sql);
                while($data=mysqli_fetch_assoc($result))
                {
            ?>
            <tr>
                <td><?php echo $data["id"]; ?></td>
                <td><?php echo $data["name"]; ?></td> 
                <td><?php echo $data["username"]; ?></td> 
                <td><?php echo $data["password"]; ?></td> 
                <td><?php echo $data["email"]; ?></td> 
                <td><?php echo $data["phno"]; ?></td> 
                 <td><a href="del-users.php?id=<?php echo $data["id"]; ?>" class="btn btn-outline-danger">delete</a></td>   
             </tr>
            <?php } ?>
        </table>

    </div>
</body>
</html>