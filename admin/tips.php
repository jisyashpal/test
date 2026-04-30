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
$query = "SELECT * FROM `tbl_ingredients` WHERE `status`='1'";
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
    <title>Add Ingredients |Munuujii</title>
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
                        <div class="col-md-5">

                            <div class="card" style="border:1px solid #8f3939; border-radius:2px;">
                                <div class="card-header">
                                    <h3 class="card-title">Add Ingredients </h3>
                                </div>
                                <div class="card-body">
                                    <form action="action.php" enctype="multipart/form-data" method="post">
                                        <div class="row">


                                            <div class="col-md-12">
                                                <label>Select Image<small style="color:red;">(1000*600)</small></label>&nbsp;<span style="color:red;"></span>

                                                <div class="form-group">
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                                <label>Name</label>&nbsp;<span style="color:red;"></span>
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control">
                                                </div>
                                                <label>Ingredient Heading</label>&nbsp;<span style="color:red;"></span>
                                                <div class="form-group">
                                                    <input type="text" name="ingredient_heading" class="form-control">
                                                </div>
                                                <label>Ingredient Subheading</label>&nbsp;<span style="color:red;"></span>
                                                <div class="form-group">
                                                    <input type="text" name="ingredient_subheading" class="form-control">
                                                </div>
                                                <label>Instruction Heading</label>&nbsp;<span style="color:red;"></span>
                                                <div class="form-group">
                                                    <input type="text" name="instruction_heading" class="form-control">
                                                </div>
                                                <label>Instruction Subheading</label>&nbsp;<span style="color:red;"></span>
                                                <div class="form-group">
                                                    <input type="text" name="instruction_subheading	" class="form-control">
                                                </div>
                                                <label>Instruction Text</label>&nbsp;<span style="color:red;"></span>
                                                <div class="form-group">
                                                    <input type="text" name="instruction_text" class="form-control">
                                                </div>
                                                <label>Tips Heading</label>&nbsp;<span style="color:red;"></span>
                                                <div class="form-group">
                                                    <input type="text" name="tips_heading" class="form-control">
                                                </div>
                                                <label>Tips Subheading</label>&nbsp;<span style="color:red;"></span>
                                                <div class="form-group">
                                                    <input type="text" name="tips_subheading" class="form-control">
                                                </div>


                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-primary btn-block" type="submit" name="addtips">
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card" style="border:1px solid #8f3939; border-radius:2px;">
                                <div class="card-header">
                                    <h3 class="card-title">Add Ingredients</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table data-table stripe hover nowrap table-bordered table-striped" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Ingredient Heading</th>
                                                    <th>Ingredient Subheading</th>
                                                    <th>Instruction Heading</th>
                                                    <th>Instruction Subheading</th>
                                                    <th>Instruction Text</th>
                                                    <th>Tips Heading</th>
                                                    <th>Action<span style="color:white;">sdfd</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $sql = "select * from tbl_ingredients where status = '1'";
                                                $res = mysqli_query($conn, $sql);
                                                $sn = 0;
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    $sn++;

                                                ?>

                                                    <tr>
                                                        <td><?= $sn; ?></td>

                                                        <td>
                                                            <center><img src=" <?php echo 'uploads/products/' . $row['image']; ?>" class="img-fluid" width="100%"></center>
                                                        </td>
                                                        <td><?php echo $row['name'] ?></td>
                                                        <td><?php echo $row['ingredient_heading'] ?></td>
                                                        <td><?php echo $row['ingredient_subheading'] ?></td>
                                                        <td><?php echo $row['instruction_heading'] ?></td>
                                                        <td><?php echo $row['instruction_subheading'] ?></td>
                                                        <td><?php echo $row['instruction_text'] ?></td>
                                                        <td><?php echo $row['tips_heading'] ?></td>
                                                        <td><?php echo $row['tips_subheading'] ?></td>



                                                        <td><button type="button" class="btn btn-sm btn-success edit  btn-block"><a href="edit_tips.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Sure! you want to Edit');"><i class="fa fa-edit" style="color:white;"></i></a></button>
                                                            <a href="deletedata.php?delete=tips&id=<?php echo $row['id']; ?>" onclick="return confirm('Sure! you want to delete');" class="btn btn-sm btn-danger  btn-block"><i class="fa fa-trash"></i></a>
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