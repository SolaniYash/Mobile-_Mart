<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome!</title>
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">

</head>

<body>
  <?php include 'header.php'; ?>

  <!--Carousel Started-->

  <div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./images/s24ultra.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Samsung S24 Ultra</h5>
          <p>Flagship phone</p>
          <a href="product-details.php?id=2" class="btn btn-outline-light">Shop Now</a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./images/iphone15.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>iPhone 15 Pro Max</h5>
          <p>Titanium Support</p>
          <a href="product-details.php?id=3" class="btn btn-outline-light">Shop Now</a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./images/OnePlus-Open.webp" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5 class="text-dark">OnePlus Open</h5>
          <p class="text-dark">Open up your world.</p>
          <a href="product-details.php?id=4" class="btn btn-outline-dark">Shop Now</a>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!--Carousel Ended-->


  <div class="text-center text-primary my-3">
    <h1><u>Shop By Brand</u></h1>
  </div>

  <div class="container">
    <div class="row text-center">
      <div class="col-4">
        <div class="card" style="width: 18rem;">
          <img src="./images/samsung-logo.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text">All Samsung Products Are Available At Our Website.</p><br>
            <a href="products.php?id=1" class="btn btn-primary col-12">Explore Now</a>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card" style="width: 18rem;">
          <img src="./images/apple-logo.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text">All Apple Products Are Available At Our Website.</p><br>
            <a href="products.php?id=2" class="btn btn-primary col-12">Explore Now</a>
          </div>
        </div>
      </div>
      <div class="col-4">
        <div class="card" style="width: 18rem;">
          <img src="./images/oneplus-logo.png" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text">All OnePlus Products Are Available At Our Website.</p><br>
            <a href="products.php?id=3" class="btn btn-primary col-12">Explore Now</a>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center text-primary">
      <h1>Featured Products</h1>
    </div>
  </div>
  <div class="row bg-primary text-light">
    <div class="col-6">
      <img src="./images/featured-1.png" height="500px" width="600px">
    </div>
    <div class="col-6 my-5">
      <h1>Samsung Z Fold-5</h1><br>
      <h5>
      The Samsung Galaxy Z Fold 5 is an Android-based foldable smartphone that was announced by Samsung Electronics on July 26, 2023.
      </h5><br>
      <a href="product-details.php?id=5" class="btn btn-light">Shop Now</a>
    </div>
  </div>
  <div class="row">
    <div class="col-6 text-primary my-5">
      <h1 class="mx-3">iPhone 14</h1><br>
      <h5 class="mx-3">
      Longest battery life ever. A new Main camera and improved image processing let you capture even more sensational shots in all kinds of light — especially low light.
      </h5><br>
      <a href="" class="btn btn-primary mx-3">Shop Now</a>
    </div>
    <div class="col-6">
      <img src="./images/featured-2.png">
    </div>
  </div>
  <div class="row bg-primary">
    <div class="col-6">
      <img src="./images/featured-3.png" class="mx-5">
    </div>
    <div class="col-6 my-5 text-light">
      <h1>OnePlus 12</h1><br>
      <h5>50MP Primary with OIS, 48MP Ultra-Wide, 64MP Portrait Tele lens - Hardware-assisted for Natural Color Calibration with Hasselblad.</h5><br>
      <a href="" class="btn btn-light">Shop Now</a>
    </div>
  </div>
</body>
<?php include 'footer.php'; ?>
</html>