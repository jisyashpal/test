<?php
$pageTitle = "test page - test";
?>


<!doctype html>
<html lang="en">

<head>
    <?php require_once './includes/header.php'; ?>
</head>

<body>
    <?php require_once './includes/navbar.php'; ?>

    <main>
        <section class="section-space py-4">
            <div class="container">
                <h1 class="mb-4">Sign Up</h1>
                <div class="row d-flex flex-column align-items-center justify-content-center">
                    <div class="col-md-6 ">
                        <div class="card">
                            <div class="card-body">
                                <form action="admin/action.php" method="POST" class="w-100">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" placeholder="Type your username"   name="username" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="email" placeholder="Type your email" name="email" >
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" >
                                    </div>
                                    <button type="submit" name="submit" value="signup" class="btn btn-primary">Sign Up</button>

                                </form>
                                <p class="mb-0">Already have an account? <a href="login.php">Login here</a></p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>


    </main>

    <?php require_once './includes/footer.php'; ?>
</body>

</html>