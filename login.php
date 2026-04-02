<?php
$pageTitle = "login page - Yash Coder";
?>
<!doctype html>
<html lang="en">

<head>
    <?php require_once './includes/header.php'; ?>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <?php require_once './includes/navbar.php'; ?>

    <div class="login-container">
        <h1> <a href="../index.php">Admin Login</a></h1>
        <form action="admin/action.php" method="POST" class="form">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" placeholder="Type your username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Type your password" name="password" required>
            </div>
            <div class="row mb-2">
                <div class="col-md-6 d-flex  justify-content-center gap-2">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <div class="col-md-6">
                    <a href="#" style="float: right; color: #667eea; text-decoration: none;">Forgot password?</a>
                </div>
            </div>
            <button type="submit" name="submit">Login</button>
        </form>
        <p class="mb-0">Don't have an account? <a href="sign-up.php">Sign up here</a></p>
    </div>
    <!-- <?php require_once './includes/footer.php'; ?> -->
</body>

</html>