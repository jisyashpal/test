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
if ($_GET['id']) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `tbl_banner` WHERE `id`='$id'";
    $run = mysqli_query($conn, $query);
    while ($data = mysqli_fetch_assoc($run)) {
        $tbl_banner = $data;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Banner | Amorous Glances </title>
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
                            <div class="card" style="border:1px solid #868585ff">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Banner</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="action.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <label>Select Your Banner Image<span style="color: red;">*<small>image should be (1920*800)</small></span></label>
                                                <input type="file" name="image" value="<?php echo $tbl_banner['image'] ?>" class="form-control mb-2 py-2" required>
                                                <input type="hidden" name="editid" value="<?php echo $tbl_banner['id']; ?>">
                                                <center><img src=" <?php echo 'uploads/banner/' . $tbl_banner['image']; ?>" class="img-fluid" width="50%"></center>
                                            </div>
                                            <div class="col-12">
                                                <hr>
                                                <center><button type="submit" name="update_banerlist" class="btn btn-sm btn-dark">update</button></center>
                                            </div>
                                        </div>
                                    </form>
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
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
    <script>
        document.querySelector('input[name="image"]').addEventListener('change', function() {
            const file = this.files[0];
            const maxSize = 20 * 1024 * 1024; // 20 MB

            if (file.size > maxSize) {
                alert('File size exceeds 20MB. Please select a smaller image.');
                this.value = ''; // Clear the file input
            }
        });
    </script>

</body>

</html>