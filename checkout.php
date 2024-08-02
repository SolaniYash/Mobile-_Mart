<?php
include 'db_connect.php';
session_start();
if (!$_SESSION["loggedin"]) {
  echo "<script>alert('plese login first')</script>";
  echo "<script>window.location.href='login.php'</script>";
}

if (isset($_POST["s1"])) {
  $uid = $_SESSION["uid"];
  $name = $_POST["txt1"];
  $email = $_POST["txt2"];
  $phno = $_POST["txt3"];
  $address = $_POST["txt4"];
  $country = $_POST["country"];
  $state = $_POST["state"];
  $zip = $_POST["zip"];
  $pay_mode = "Cash On Delivery";
  $total_price = $_SESSION["total_price"];
  $date = date('Y-m-d');

  $q = "insert into orders(uid,full_name,email,phno,address,country,state,zip,pay_mode,total_price,date) values(" . $uid . ",'" . $name . "','" . $email . "'," . $phno . ",'" . $address . "','" . $country . "','" . $state . "'," . $zip . ",'" . $pay_mode . "'," . $total_price . ",'" . $date . "')";

  if (mysqli_query($conn, $q)) {
    $order_id = mysqli_insert_id($conn);
    $uid = $_SESSION["uid"];
    $sql = "select * from cart where uid=" . $uid;
    $result = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_assoc($result)) {
      $assoc_array = array('pid' => $data["pid"], 'image' => $data["image"], 'name' => $data["name"], 'price' => $data["price"], 'qty' => $data["qty"]);
      $q = "insert into order_details(order_id,uid,pid,image,name,price,qty) values(" . $order_id . "," . $uid . ",'" . implode("','", array_values($assoc_array)) . "')";
      if (mysqli_query($conn, $q)) {

        $sql = "delete from cart where uid=" . $_SESSION["uid"];

        if (mysqli_query($conn, $sql)) {

          echo "<script>alert('Order Placed Successfully')</script>";
          echo "<script>window.location.href='index.php'</script>";
        } else {
          echo "Error in 3rd Level";
        }
      } else {
        echo "Error in 2nd Level";
      }
    }
  } else {
    echo "Error in 1st Level";
  }
}

?>


<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>

</head>

<body class="bg-body-tertiary">

  <?php include 'header.php'; ?>

  <div class="container">
    <main>
      <div class="py-5 text-center text-primary">
        <img src="./icons/icons8-checkout-100.png">
        <h2>Checkout form</h2>
      </div>
      <?php
      $sql = "select * from users where id=" . $_SESSION["uid"];
      $result = mysqli_query($conn, $sql);
      while ($data = mysqli_fetch_assoc($result)) {
      ?>
        <div class="col-md-7 col-lg-12">
          <h4 class="mb-3">Shipping address</h4>
          <form method="post" class="needs-validation" novalidate>
            <div class="row g-3">
              <div class="col-sm-6 col-md-12">
                <label for="firstName" class="form-label">Full Name</label>
                <input type="text" name="txt1" value="<?php echo $data["name"]  ?>" class="form-control" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>

              <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="txt2" value="<?php echo $data["email"]  ?>" class="form-control">
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>

              <div class="col-12">
                <label for="number" class="form-label">Phone Number</label>
                <input type="number" name="txt3" value="<?php echo $data["phno"]  ?>" class="form-control">
                <div class="invalid-feedback">
                  Please enter a valid number for shipping updates.
                </div>
              </div>
            <?php } ?>
            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" name="txt4" class="form-control" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select name="country" class="form-select" id="country" required>
                <option value="">Choose...</option>
                <option>India</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <select name="state" class="form-select" id="state" required>
                <option value="">Choose...</option>
                <option>Gujarat</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="number" name="zip" class="form-control" id="zip" placeholder="" min="1" max="400000" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
            </div>

            <hr class="my-4">

            <h4 class="mb-3">Payment</h4>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
              <label class="form-check-label" for="flexRadioDisabled">
                UPI
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
              <label class="form-check-label" for="flexRadioDisabled">
                Credit Card
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled" disabled>
              <label class="form-check-label" for="flexRadioDisabled">
                Debit Card
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
              <label class="form-check-label" for="flexRadioDefault2">
                Cash On Delivery
              </label>
            </div>
        </div>

        <button class="w-100 btn btn-primary btn-lg" name="s1" type="submit">Place Order -></button>
        </form>
  </div>
  </div>
  </main>

  </div>
</body>
<?php include 'footer.php'; ?>
</html>