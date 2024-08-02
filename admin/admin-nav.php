<?php

error_reporting(0);
session_start();

?>


<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <img src="../icons/icons8-smartphone-60.png">
        <a class="navbar-brand text-light" href="dashboard.php">Mobilemart</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="ms-auto">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="dashboard.php">Home</a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo "Hi " . $_SESSION["admin_unm"]; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                            Menu
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Admin Panel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            You can customize each and every brand, product and user from here.
        </div>
        <a href="brands.php" class="btn btn-primary my-2">Brand Manager</a><br>
        <a href="products.php" class="btn btn-primary my-2">Product Manager</a><br>
        <a href="users.php" class="btn btn-primary my-2">User Manager</a><br>
        <a href="orders.php" class="btn btn-primary my-2">Order Manager</a>
    </div>
</div>
<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>