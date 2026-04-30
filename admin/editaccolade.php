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

$tbl_accolade = null;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM `tbl_accolades` WHERE `id`='$id'";
    $run = mysqli_query($conn, $query);
    if ($run && mysqli_num_rows($run) > 0) {
        $tbl_accolade = mysqli_fetch_assoc($run);
    }
}

if (!$tbl_accolade) {
    $_SESSION['msg'] = "Accolade not found.";
    header('Location:accolades.php');
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Accolade | Amorous Glances</title>
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
                                    <h3 class="card-title">Edit Accolade</h3>
                                </div>
                                <div class="card-body">
                                    <form action="action.php" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Title<span style="color: red;">*</span></label>
                                                <input type="text" name="title" class="form-control" required value="<?php echo htmlspecialchars($tbl_accolade['title'], ENT_QUOTES); ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Image</label>
                                                <input type="file" name="image" class="form-control">
                                                <input type="hidden" name="editid" value="<?php echo $tbl_accolade['id']; ?>">
                                            </div>
                                            <div class="col-md-12 mt-2">
                                                <p>Current image:</p>
                                                <img src="uploads/accolades/<?php echo $tbl_accolade['image']; ?>" width="120" alt="Accolade Image">
                                            </div>
                                            <div class="col-12 mt-3">
                                                <button type="submit" name="update_accolade" class="btn btn-sm btn-primary">Update</button>
                                                <a href="accolades.php" class="btn btn-sm btn-secondary">Cancel</a>
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
    </div>
    <?php include 'includes/footer-links.php'; ?>
</body>

</html>
