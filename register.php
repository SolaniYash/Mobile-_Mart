<?php
include 'db_connect.php';
if(isset($_POST["s1"])){

    $fullname =  $_POST["txt1"];
    $username = $_POST["txt2"];
    $password = $_POST["txt3"];
    $email = $_POST["txt4"];
    $phno = $_POST["txt5"];

    $q = "insert into users(name,username,password,email,phno) values('".$fullname."','".$username."','".$password."','".$email."',".$phno.")";

    if(mysqli_query($conn,$q)){
        echo "<script>alert('User Registered Successfully')</script>";
        echo "<script>window.location.href='login.php'</script>";

    }
    else{
        echo "<script>alert('User registration failed')<script>";
    }
}
    
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container text-center text-primary">
        <form method="post">
            <div class="row my-3">
                <h1>Register Here!</h1>
            </div>
            <div class="row my-3">
                <h3>Full Name:-&nbsp;&nbsp;&nbsp;<input type="text" name="txt1" required></h3>
            </div>
            <div class="row my-3">
                <h3>Username:-&nbsp;&nbsp;&nbsp;<input type="text" name="txt2" required></h3>
            </div>
            <div class="row">
                <h3>Password:-&nbsp;&nbsp;&nbsp;<input type="password" name="txt3" required></h3>
            </div>
            <div class="row my-3">
                <h3>Email:-&nbsp;&nbsp;&nbsp;<input type="email" name="txt4" required></h3>
            </div>
            <div class="row my-3">
                <h3>Ph. No:-&nbsp;&nbsp;&nbsp;<input type="number"  name="txt5" required></h3>
            </div>
            <div class="my-4">
            <input type="submit" class="btn btn-primary" value="Register" name="s1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" class="btn btn-danger">
            </div>
        </form>
    </div>
</body>
<?php include 'footer.php'; ?>
</html>