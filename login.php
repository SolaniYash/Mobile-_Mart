<?php

session_start();
include 'db_connect.php';

if(isset($_POST["s1"])){

    $username=$_POST["txt1"];
    $password=$_POST["txt2"];

    $q="select * from users where username='".$username."' AND  password='".$password."' ";
    $q2="select * from admin_users where username='".$username."' AND  password='".$password."' ";

    $user_query=mysqli_query($conn,$q);
    $admin_query=mysqli_query($conn,$q2);

    $data=mysqli_fetch_assoc($user_query);

    if(mysqli_num_rows($user_query)==1){
        $_SESSION["loggedin"]=true;
        $_SESSION["uid"]=$data["id"];
        $_SESSION["unm"]=$username;
        header("Location: index.php");
    }
    elseif(mysqli_num_rows($admin_query)==1){
        $_SESSION["admin_loggedin"]=true;
        $_SESSION["admin_unm"]=$username;
        header("Location: admin/dashboard.php");
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
    <title>Login</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container text-center text-primary">
        <form method="post">
            <div class="row my-3">
                <h1>Login Here!</h1>
            </div>
            <div class="row my-3">
                <h3>Username:-&nbsp;&nbsp;&nbsp;<input type="text" name="txt1"></h3>
            </div>
            <div class="row">
                <h3>Password:-&nbsp;&nbsp;&nbsp;<input type="password" name="txt2"></h3>
            </div>
            <div class="my-4">
                <input type="submit" class="btn btn-primary" value="Login" name="s1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" class="btn btn-danger">
            </div>
        </form>
    </div>
    <div class="my-3 text-center">
        <h5>Don't have an account?<a href="register.php">Register</a></h5>
    </div>
</body>
<?php include 'footer.php'; ?>
</html>