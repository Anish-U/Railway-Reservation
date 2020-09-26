<?php
  session_start();
  include ('database.inc.php');
  include ('function.inc.php');
  $msg = '';

  if(isset($_POST['submit'])){
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $query = "select * from user_details where username='$username' and password='$password'";
    $res = mysqli_query($con,$query);
    $count = mysqli_num_rows($res);

    if($count>0){
      $row = mysqli_fetch_assoc($res);
      $_SESSION['SUCCESS'] = 'yes';
      $_SESSION['USER'] = $row['username'];
      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['PASSWORD'] = $row['password'];
      redirect('index.php');
    }
    else{
      $msg = "Please Enter valid details";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Railway Reservation Login</title>
  <!-- plugins css -->
  <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/css/vendor.bundle.base.css">
  <!-- end inject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
  <!-- End plugin css for this page -->
  <!-- inject css -->
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
  .error_msg {
    color: red;
    margin-top: 10px;
    padding: 5px;
  }

  .logo-name {
    color: purple;
    padding: 15px;
    font-family: 'Jost', sans-serif;
    font-size: 35px;
  }

  .login-text {
    margin-top: 26px;
    padding: 0px;
  }
  </style>
</head>

<body class="sidebar-light">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <h6 class="font-weight-bold logo-name text-center">Railway Reservation</h6>
              <div class="text-center">
                <img src="assets/images/logo1.png" alt="logo">
              </div>
              <h6 class="font-weight-light login-text">Log in to continue.</h6>
              <!-- Form Starts -->
              <form class="pt-3" method="post">
                <div class="form-group">
                  <input type="text" name="user" autocomplete="off" class="form-control form-control-lg"
                    id="user_username" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <input type="password" autocomplete="off" class="form-control form-control-lg" id="user_password"
                    placeholder="Password" name="pass" required>
                </div>
                <div class="mt-3">
                  <input type="submit" name="submit"
                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="#" value="LOG IN">
                </div>
              </form>
              <div class="error_msg">
                <?php
                  echo $msg;
                ?>
              </div>
              <!-- Form Starts -->
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <!-- plugins js -->
  <script src="assets/js/vendor.bundle.base.js"></script>
  <!-- end inject -->
  <!-- Plugin js for this page -->
  <script src="assets/js/Chart.min.js"></script>
  <script src="assets/js/bootstrap-datepicker.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- end inject -->
  <!-- Custom js for this page-->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>