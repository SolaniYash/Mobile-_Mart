<?php 
error_reporting(0);
 session_start();
include 'db_connect.php';
 ?>
<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
<nav class="navbar navbar-expand-lg text-white bg-primary">
  <div class="container-fluid">
    <a href="index.php"><img src="./icons/icons8-smartphone-60.png"></a>
    <a class="navbar-brand text-light" href="index.php">Mobilemart</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="ms-auto">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-light active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light active" aria-current="page" href="contact.php">Contact us</a>
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Brands
          </a>
          <ul class="dropdown-menu">
            <?php
            $sql="select * from brands";
            $result=mysqli_query($conn,$sql);
            while($data=mysqli_fetch_assoc($result)) {
            ?>
            <li><a class="dropdown-item" href="products.php?id=<?php echo $data["id"]; ?>"><?php echo $data["name"]; ?></a></li>
            <?php } ?>
          </ul>
        </li>
        <?php if (!$_SESSION["loggedin"]){
          
          ?>
          <li class="nav-item">
            <a class="nav-link text-light" href="login.php">Login</a>
          </li>
          <?php }
          else {
            ?>
            <li class="nav-item">
            <a class="nav-link text-light" href="cart.php">Cart (<?php 
            $sql="select * from cart where uid=".$_SESSION["uid"];
            $result=mysqli_query($conn,$sql);
            $noOfProdcuts=mysqli_num_rows($result);
            echo $noOfProdcuts;
            ?>)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="orders.php">My Orders</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo "Hi ".$_SESSION["unm"]; ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>
            <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</nav>
<script src="./bootstrap/js/bootstrap.bundle.min.js"></script>