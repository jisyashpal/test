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
$query = "SELECT * FROM `write_review` WHERE `status`='1'";
$run = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($run)) {
    $galleryevent[] = $row;
}
// echo "<PRE>";
// print_r($galleryevent);
// die;
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../images/logo/favicon.png" type="image/x-icon">
    <title>Write a Review | Amorous Glances</title>
    <?php include 'includes/header-links.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include 'includes/top-header.php'; ?>
        <?php include 'includes/sidebar.php'; ?>
        <div class="content-wrapper">
            <?php include 'includes/page-header.php'; ?>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- <div class="col-md-5">

                            <div class="card" style="border:1px solid #8f3939; border-radius:2px;">
                                <div class="card-header">
                                    <h3 class="card-title">Write a Review</h3>
                                </div>
                                <div class="card-body">
                                    <form action="action.php" enctype="multipart/form-data" method="post">
                                        <div class="row">


                                            <div class="col-md-12">

                                                <label>Name</label>&nbsp;<span style="color:red;"></span>
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control">
                                                </div>
                                                <label>Organization</label>&nbsp;<span style="color:red;"></span>
                                                <div class="form-group">
                                                    <input type="text" name="organization" class="form-control">
                                                </div>
                                                <label>Designation</label>&nbsp;<span style="color:red;"></span>
                                                <div class="form-group">
                                                    <input type="text" name="designation" class="form-control">
                                                </div>
                                                <label>mnumber</label>&nbsp;<span style="color:red;"></span>
                                                <div class="form-group">
                                                    <input type="number" name="mnumber" class="form-control">
                                                </div>
                                                <label>Email</label>&nbsp;<span style="color:red;"></span>
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-control">
                                                </div>
                                                <label>Review</label>&nbsp;<span style="color:red;"></span>
                                                <div class="form-group">
                                                    <input type="text" name="review" class="form-control">
                                                </div>
                                                <label>Select Image<small style="color:red;">(1000*600)</small></label>&nbsp;<span style="color:red;"></span>

                                                <div class="form-group">
                                                    <input type="file" name="image" class="form-control">
                                                </div>


                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-primary btn-block" type="submit" name="addrecipecollection">
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <div class="card" style="border:1px solid #8f3939; border-radius:2px;">
                                <div class="card-header">
                                    <h3 class="card-title">Write a Review</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table data-table stripe hover nowrap table-bordered table-striped" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Name</th>
                                                    <th>Organization</th>
                                                    <th>Designation</th>
                                                    <th>Phone Number</th>
                                                    <th>Email</th>
                                                    <th>Review</th>
                                                    <th>Image</th>
                                                    <th>Action<span style="color:white;">sdfd</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $sql = "select * from write_review where status = '1'";
                                                $res = mysqli_query($conn, $sql);
                                                $sn = 0;
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    $sn++;

                                                ?>

                                                    <tr>
                                                        <td><?= $sn; ?></td>
                                                        <td><?php echo $row['name'] ?></td>
                                                        <td><?php echo $row['organization'] ?></td>
                                                        <td><?php echo $row['designation'] ?></td>
                                                        <td><?php echo $row['mnumber'] ?></td>
                                                        <td><?php echo $row['email'] ?></td>
                                                        <td><?php echo $row['review'] ?></td>
                                                      
                                                        <td>
                                                            <center><img src=" <?php echo 'uploads/image/' . $row['image']; ?>" class="img-fluid" width="100%"></center>
                                                        </td>

                                                        <td>
                                                            <!-- <button type="button" class="btn btn-sm btn-success edit  btn-block"><a href="edit_recipecollection.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Sure! you want to Edit');"><i class="fa fa-edit" style="color:white;"></i></a></button> -->
                                                            <a href="deletedata.php?delete=write_review&id=<?php echo $row['id']; ?>" onclick="return confirm('Sure! you want to delete');" class="btn btn-sm btn-danger  btn-block"><i class="fa fa-trash"></i></a>
                                                        </td>


                                                        </button>

                                                        </td>
                                                    </tr>
                                                <?php  }  ?>
                                            </tbody>
                                        </table>
                                    </div>

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
    <?php include 'includes/footer-links.php'; ?>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>