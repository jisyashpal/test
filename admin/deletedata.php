<?php
include "connection.php";

// Banner
if (isset($_GET['delete']) && $_GET['delete'] == 'tbl_banner') {
  $id = $_GET['id'];
  $sql = "DELETE FROM `tbl_banner` WHERE `id`='$id'";
  $run = mysqli_query($conn, $sql);
  if ($run == true) {
  } else {
  }
  header("location:bannerlist.php");
}
// Testimonial
if (isset($_GET['delete']) && $_GET['delete'] == 'testimonials') {
  $id = $_GET['id'];
  $sql = "DELETE FROM `testimonials` WHERE `id`='$id'";
  $run = mysqli_query($conn, $sql);
  if ($run == true) {
  } else {
  }
  header("location:testimonial.php");
}
// contact
if (isset($_GET['delete']) && $_GET['delete'] == 'contact') {
  $id = $_GET['id'];
  $sql = "DELETE FROM `contact` WHERE `id`='$id'";
  $run = mysqli_query($conn, $sql);
  if ($run == true) {
  } else {
  }
  header("location:contact.php");
}
// review
if (isset($_GET['delete']) && $_GET['delete'] == 'write_review') {
  $id = $_GET['id'];
  $sql = "DELETE FROM `write_review` WHERE `id`='$id'";
  $run = mysqli_query($conn, $sql);
  if ($run == true) {
  } else {
  }
  header("location:write-review.php");
}

// Co-Sponsors
if (isset($_GET['delete']) && $_GET['delete'] == 'tbl_co_sponsors') {
  $id = $_GET['id'];
  $sql = "DELETE FROM `tbl_co_sponsors` WHERE `id`='$id'";
  $run = mysqli_query($conn, $sql);
  header("location:co-sponsors.php");
}

// Accolades
if (isset($_GET['delete']) && $_GET['delete'] == 'tbl_accolades') {
  $id = $_GET['id'];
  $sql = "DELETE FROM `tbl_accolades` WHERE `id`='$id'";
  $run = mysqli_query($conn, $sql);
  header("location:accolades.php");
}
