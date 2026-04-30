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
    <title>Contact Us | Amorous Glances</title>
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
                        <div class="col-md-12">
                            <div class="card" style="border:1px solid #428bca">
                                <div class="card-header">
                                    <h3 class="card-title">Contact Us</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table data-table stripe hover nowrap table-bordered table-striped"
                                            id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Subject</th>
                                                    <th>Message</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "select * from contact where status = '1'";
                                                $res = mysqli_query($conn, $sql);
                                                $sn = 0;
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    $sn++;

                                                ?>

                                                    <tr>
                                                        <td><?= $sn; ?></td>
                                                        <td><?= $row['name']; ?></td>
                                                        <td><?= $row['email']; ?></td>
                                                        <td><?= $row['subject']; ?></td>
                                                        <td><?= $row['message']; ?></td>
                                                        <td>
                                                            <!-- <button type="button" class="btn btn-sm btn-success edit  btn-block"><a href="editbannerlist.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Sure! you want to Edit');"><i class="fa fa-edit" style="color:white;"></i></a></button> -->
                                                            <a href="deletedata.php?delete=contact&id=<?php echo $row['id']; ?>"
                                                                onclick="return confirm('Sure! you want to delete');"
                                                                class="btn btn-sm btn-danger  btn-block"><i
                                                                    class="fa fa-trash"></i></a>
                                                        </td>



                                                        <!-- <td>
                                                            <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                        </td> -->
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
                "autoWidth": false,
            });
        });
    </script>
</body>

</html>