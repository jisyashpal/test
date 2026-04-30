<?php
session_start();
include_once('connection.php');


// echo '<pre>';
// print_r($_SESSION);die;

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="../images/logo/favicon.png" type="image/x-icon">
  <title>Dashboard | Amorous Glances</title>
  <?php include 'includes/header-links.php'; ?>
  <?php include 'includes/footer-links.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <?php include 'includes/top-header.php'; ?>
    <?php include 'includes/sidebar.php'; ?>
    <div class="content-wrapper">
      <?php include 'includes/page-header.php'; ?>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid" style="padding-top:20px; padding-bottom:20px; border-radius:5px;">
          <h2>For Your Website</h2>
          <div class="row">


            <div class="col-lg-2 col-6">
              <div class="small-box ">
                <div class="inner" style="border: 1px solid #858586ff;">
                  <?php $sql = "select * from tbl_banner where status = '1'";
                  $res = mysqli_query($conn, $sql);
                  ?>
                  <h3><?php echo mysqli_num_rows($res); ?></h3>
                  <p>Bannerlist</p>
                </div>
                <div class="icon">
                  <i class="fa-solid fa-sliders" style="font-size: 43px; color: #0f0d0cff;"></i>
                </div>
                <a href="bannerlist.php" class="bg-dark small-box-footer">Click To View <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-2 col-6">
              <div class="small-box ">
                <div class="inner" style="border: 1px solid #007bff;">
                  <?php $sql = "select * from  testimonials where status = '1'";
                  $res = mysqli_query($conn, $sql);
                  ?>
                  <h3><?php echo mysqli_num_rows($res); ?></h3>
                  <p>Testimonials</p>
                </div>
                <div class="icon">
                  <i class="fa-solid fa-comment" style="font-size: 43px;color: #0f0d0cff;"></i>
                </div>
                <a href="testimonial.php" class="bg-dark small-box-footer">Click To View <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>


            <div class="col-lg-2 col-6">
              <div class="small-box ">
                <div class="inner" style="border: 1px solid #007bff;">
                  <?php $sql = "select * from write_review where status = '1'";
                  $res = mysqli_query($conn, $sql);
                  ?>
                  <h3><?php echo mysqli_num_rows($res); ?></h3>
                  <p>Write a Review</p>
                </div>
                <div class="icon">
                  <i class="fa-solid fa-square-pen" style="font-size: 43px;color: #0f0d0cff;"></i>
                </div>
                <a href="write-review.php" class="bg-dark small-box-footer">Click To View <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            <div class="col-lg-2 col-6">
              <div class="small-box ">
                <div class="inner" style="border: 1px solid #007bff;">
                  <?php $sql = "select * from  contact where status = '1'";
                  $res = mysqli_query($conn, $sql);
                  ?>
                  <h3><?php echo mysqli_num_rows($res); ?></h3>
                  <p>Contact Us</p>
                </div>
                <div class="icon">
                  <i class="fa-solid fa-address-book" style="font-size: 43px;color: #0f0d0cff;"></i>
                </div>
                <a href="contact.php" class="bg-dark small-box-footer">Click To View <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>

            

          </div>
        </div>

      </section>
    </div>

    <?php include 'includes/copyright.php'; ?>


    <aside class="control-sidebar control-sidebar-dark">
    </aside>
  </div>



</body>

</html>