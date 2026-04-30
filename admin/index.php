<?php
session_start();
include 'connection.php';
$msg = "";
if (isset($_SESSION['msg'])) {
  $msg = $_SESSION['msg'];
  unset($_SESSION['msg']);
}
if ($msg != "") {
  echo "<script> alert('$msg')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="shortcut icon" href="../images/logo/favicon.png" type="image/x-icon"> -->
  <title>Login | Amorous Glances</title>
  <?php include 'includes/header-links.php'; ?>
  <?php include 'includes/footer-links.php'; ?>
  <style>
    /* body {
      background-image: url('../img/bg/bg.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    } */

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 1;
    }

    .login-box {
      position: relative;
      z-index: 2;
      max-width: 400px;
      margin: 100px auto;
    }

    .card {
      background: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      padding: 20px;
    }

    .login-box h3 {
      font-family: 'Poppins', sans-serif;
      color: #c20000;
    }

    .login-box h3 span {
      color: #5f7632;
    }

    .login-box h4 {
      font-family: 'Roboto', sans-serif;
      color: #252721;
      margin-bottom: 20px;
    }

    .form-control {
      border-radius: 20px;
      border: 1px solid #ccc;
    }

    .btn-success {
      background: #5f7632;
      border: none;
      border-radius: 20px;
      padding: 10px 15px;
      transition: background 0.3s ease;
    }

    .btn-success:hover {
      background: #c20000;
    }

    .input-group-text {
      background: #5f7632;
      color: #fff;
      border: none;
      border-radius: 0 20px 20px 0;
    }
  </style>
</head>

<body>
  <div class="overlay" style="background: rgb(0 0 0);"></div>
  <div class="login-box">
    <div class="card">
      <div class="card-body">
        <!-- <center>
          <a href="../index.php">
          <img src="../images/logo/logo-copy.png" alt="" class="img-fluid" style="width:100%;">
          </a>
        </center> -->
        <h2 class="text-center text-dark mt-4 mb-0"><b>Admin </b></h2>
        <h4 class="login-box-msg mb-0">Login Your Credentials</h4>

        <form action="action.php" method="post">
          <div class="input-group mb-3">
            <input type="text" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text" style="background:#141312;">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="pass" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text" style="background:#141312;">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <button type="submit" name="adminlogin" class="btn btn-dark btn-block">Login</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
