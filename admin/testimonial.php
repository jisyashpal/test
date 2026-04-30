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
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link rel="shortcut icon" href="../images/logo/favicon.png" type="image/x-icon"> -->
    <title>Add Testimonials | Amorous Glances</title>
    <?php include 'includes/header-links.php'; ?>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Kaisei+Tokumin:wght@400;500;700&family=Poppins:wght@300;400;500&display=swap');

    :root {
        --lg-font: 'Kaisei Tokumin', serif;
        --sm-font: 'Poppins', sans-serif;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include 'includes/top-header.php'; ?>
        <?php include 'includes/sidebar.php'; ?>
        <div class="content-wrapper">
            <?php include 'includes/page-header.php'; ?>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="border:1px solid #428bca">
                                <div class="card-header">
                                    <h3 class="card-title">Add New Testimonials</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="action.php" enctype="multipart/form-data" method="post">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <label>Name<span style="color: red;">*</span></label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Profession<span style="color: red;">*</span></label>
                                                <input type="text" name="profession" class="form-control" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Review<span style="color: red;">*</span></label>
                                                <input type="text" name="review" class="form-control" required style="padding:30px;">
                                            </div>
                                            <div class="col-12">
                                                <hr>
                                                <button type="submit" name="addtestimonial" class="btn btn-sm btn-primary">submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card" style="border:1px solid #8f3939; border-radius:2px;">
                                <div class="card-header">
                                    <h3 class="card-title">Our Clients</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table data-table stripe hover nowrap table-bordered table-striped" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Name</th>
                                                    <th>Profession</th>
                                                    <th>Review</th>
                                                    <th>Action<span style="color:white;">sdfd</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "select * from testimonials where status = '1'";
                                                // echo "<pre>";
                                                //     print_r($sql);
                                                $res = mysqli_query($conn, $sql);
                                                $sn = 0;
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    $sn++;
                                                    // echo "<pre>";
                                                    // print_r($row);
                                                ?>
                                                    <tr>
                                                        <td><?= $sn; ?></td>
                                                        <td><?= $row['name']; ?></td>
                                                        <td><?= $row['profession']; ?></td>
                                                        <td><?= $row['review']; ?></td>
                                                        <td>
                                                            <!-- <button type="button" class="btn btn-sm btn-success edit"><a href="editgallery.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Sure! you want to Edit');"><i class="fa fa-edit" style="color:white;"></i></a></button> -->
                                                            <a href="deletedata.php?delete=testimonials&id=<?php echo $row['id']; ?>" onclick="return confirm('Sure! you want to delete');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
                </div>
            </section>
        </div>
        <?php include 'includes/copyright.php'; ?>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <?php include 'includes/footer-links.php'; ?>
    <script>
        $(function() {
            $("#myTable").DataTable({
                "responsive": true,
                "autoWidth": true,
            });
        });
    </script>
</body>

</html>