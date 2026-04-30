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
    <title>Manage Co-Sponsors | Amorous Glances</title>
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
                                    <h3 class="card-title">Add New Co-Sponsor</h3>
                                </div>
                                <div class="card-body">
                                    <form action="action.php" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Title<span style="color: red;">*</span></label>
                                                <input type="text" name="title" class="form-control" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Image<span style="color: red;">*</span></label>
                                                <input type="file" name="image" class="form-control" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Description<span style="color: red;">*</span></label>
                                                <textarea name="description" class="form-control" required rows="3"></textarea>
                                            </div>
                                            <div class="col-12 mt-3">
                                                <button type="submit" name="addsponsor" class="btn btn-sm btn-primary">submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card" style="border:1px solid #8f3939; border-radius:2px;">
                                <div class="card-header">
                                    <h3 class="card-title">Co-Sponsors List</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table data-table stripe hover nowrap table-bordered table-striped" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Image</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "select * from tbl_co_sponsors where status = '1' ORDER BY id DESC";
                                                $res = mysqli_query($conn, $sql);
                                                $sn = 0;
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    $sn++;
                                                ?>
                                                    <tr>
                                                        <td><?= $sn; ?></td>
                                                        <td><img src="uploads/sponsors/<?= $row['image']; ?>" width="100px"></td>
                                                        <td><?= $row['title']; ?></td>
                                                        <td><?= $row['description']; ?></td>
                                                        <td>
                                                            <a href="deletedata.php?delete=tbl_co_sponsors&id=<?php echo $row['id']; ?>" onclick="return confirm('Sure! you want to delete');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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