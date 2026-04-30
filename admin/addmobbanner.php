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
    <title>Add Mobile Banner </title>
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
                        <div class="col-md-4">
                     
                            <div class="card" style="border:1px solid #8f3939; border-radius:2px;">
                                <div class="card-header">
                                    <h3 class="card-title">Add New Mobile Banner </h3>
                                </div>
                                <div class="card-body">
                                    <form action="action.php" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Select All Banner Images One By One</label>&nbsp;<span style="color:red;"></span>

                                                <div class="form-group">
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-primary btn-block" type="submit" name="addbannermob">
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card" style="border:1px solid #8f3939; border-radius:2px;">
                                <div class="card-header">
                                    <h3 class="card-title">Edit / Delete Mobile Banner List</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table data-table stripe hover nowrap table-bordered table-striped" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Banner</th>
                                                    
                                                    <th>Action<span style="color:white;">sdfd</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "select * from tbl_bannermobile where status = '1'";
                                                $res = mysqli_query($conn, $sql);
                                                $sn = 0;
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    $sn++;
                                                    // echo "<pre>";
                                                    // print_r($row);
                                                ?>
                                                    <tr>
                                                        <td><?= $sn; ?></td>
                                                        <td><center><img src=" <?php echo 'uploads/banner/' . $row['image']; ?>" class="img-fluid" width="50%"></center></td>
                                                        <td><button type="button" class="btn btn-sm btn-success edit  btn-block"><a href="edit_bannermob.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Sure! you want to Edit');"><i class="fa fa-edit" style="color:white;"></i></a></button>
                                                            <a href="deletedata.php?delete=tbl_bannermobile&id=<?php echo $row['id']; ?>" onclick="return confirm('Sure! you want to delete');" class="btn btn-sm btn-danger  btn-block"><i class="fa fa-trash"></i></a>
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