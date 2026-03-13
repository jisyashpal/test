<?php
$pageTitle = "about page - test";
?>


<!doctype html>
<html lang="en">

<head>
    <?php require_once './includes/header.php'; ?>
</head>

<body>
    <?php require_once './includes/navbar.php'; ?>

    <main>
        <section class="section-space" id="about">
            <div class="container">
                <div class="row align-items-center gy-4">
                    <div class="col-lg-5 reveal">
                        <img src="./imag/slider2.png" alt="Creative setup" class="about-image img-fluid" />
                    </div>
                    <div class="col-lg-7 reveal">
                        <p class="section-tag">About Me</p>
                        <h2 class="section-title">A developer who combines strategy with design.</h2>
                        <p class="section-text">
                            I specialize in responsive websites built with HTML, CSS, JavaScript, and Bootstrap.
                            My focus is creating interfaces that look premium, load quickly, and work perfectly on mobile, tablet, and desktop.
                        </p>
                        <div class="row g-3 mt-2">
                            <div class="col-sm-6">
                                <div class="feature-box">
                                    <i class="fa-solid fa-mobile-screen-button"></i>
                                    <h5>Responsive First</h5>
                                    <p>Layouts that adapt to every screen size without breaking.</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="feature-box">
                                    <i class="fa-solid fa-gauge-high"></i>
                                    <h5>Performance Focus</h5>
                                    <p>Optimized code and smooth interactions for better UX.</p>
                                </div>
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