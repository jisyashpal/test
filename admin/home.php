<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/data.php'; ?>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 bg-dark text-white p-4" style="min-height: 100vh;">
                <h2 class="mb-4"><?php echo $user; ?> Panel</h2>
                <ul class="list-unstyled">
                    <li class="mb-3"><a href="#" class="text-white text-decoration-none active">Dashboard</a></li>
                    <li class="mb-3"><a href="#" class="text-white text-decoration-none">Users</a></li>
                    <li class="mb-3"><a href="slider.php" class="text-white text-decoration-none">Slider</a></li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 p-4">
                <div class="header mb-4 d-flex justify-content-between align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>

                    <div class="user-icons d-flex gap-3 align-items-center">
                        <a href="#" class="text-decoration-none text-dark">
                            <i class="bi bi-bell-fill fs-5"></i>
                        </a>
                        <a href="#" class="text-decoration-none text-dark">
                            <i class="bi bi-envelope-fill fs-5"></i>
                        </a>
                        <a href="#" class="text-decoration-none text-dark">
                            <i class="bi bi-person-circle fs-5"></i>
                        </a>
                    </div>
                </div>

                <!-- Dashboard Cards -->
                <div class="row g-3">
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Users</h5>
                                <p class="card-text fs-4"><?php echo $totalUsers; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Products</h5>
                                <p class="card-text fs-4"><?php echo $totalProducts; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Orders</h5>
                                <p class="card-text fs-4"><?php echo $totalOrders; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Revenue</h5>
                                <p class="card-text fs-4"><?php echo $totalRevenue; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>

</html>