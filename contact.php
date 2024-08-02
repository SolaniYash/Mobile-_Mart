<?php
include 'db_connect.php';
if(isset($_POST["s1"]))
{
    $name = $_POST["txt1"];
    $email = $_POST["txt2"];
    $message = $_POST["txt3"];

    $q = "insert into contact(name, email, message) values ('".$name."','".$email."','".$message."')";
    $result = mysqli_query($conn,$q);
    echo "<script> alert('message sent successfully')</script>";
    echo "<script> window.location.href='index.php'</script>";

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
    <?php include 'header.php'?>

    <div class="container">
        <div class="text-center text-primary my-3">
            <h1><u>Contact us </u></h1>
        </div>
        <form method="post">
            <div>
                
                <h3>Name</h3>
                <input type="text" class="form-control-md" name="txt1"><br>
                <h3>Email</h3>
                <input type="email" class="form-control-md" name="txt2"><br>
                <h3>Message</h3>
                <textarea name="txt3" rows="3" cols="50"></textarea><br>
                <input type="submit" name="s1" value="Send Message" class="btn btn-primary my-3 mx-3">
                <input type="reset" value="reset" class="btn btn-dark">
            </div>
        </form>
    </div>
</body>
<?php include 'footer.php'; ?>
</html>