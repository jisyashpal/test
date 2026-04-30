<?php
if (!isset($_SESSION['role']) || $_SESSION['role'] === 'admin') {
  header("Location: index.php");
  exit;
}
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background: #16110e;display: flex;justify-content: space-between;">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color:white;"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="dashboard.php" class="nav-link" style="color:white;">Home</a>
    </li>
    <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
  </ul>

  <div class="card" style="border-radius: 8px;margin:0;">
    <div class="card-body d-flex align-items-center p-2">
      <img src="<?php echo isset($_SESSION['image']) ? 'uploads/admin/' . $_SESSION['image'] : '../images/user.png'; ?>"
        alt="Profile Image" class="rounded-circle" style="width: 50px; object-fit: cover;">
      <!-- <p class="mx-1 mb-0 capitalize-text" style="font-family: 'Arial', sans-serif; font-size: 16px; color: #333;">
        <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Name'; ?><br>
        <b style="color:red;"><?php echo isset($_SESSION['role']) ? $_SESSION['role'] : 'Role'; ?> Login</b>
      </p> -->
      <a href="logout.php" class="btn btn-outline-dark mx-3" style="font-size: 14px;" onclick="return confirm('Are you sure you want to log out?');">Logout</a>
    </div>
  </div>

</nav>
<!-- /.navbar -->