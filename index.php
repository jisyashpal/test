<?php
$pageTitle = "coder - Home";
?>
<!doctype html>
<html lang="en">

<head>
    <?php require_once './includes/header.php'; ?>
</head>

<body>
    <?php require_once './includes/navbar.php'; ?>

    <main>
        <section class="hero-section" id="home">
            <div class="container">
                <div class="row align-items-center gy-5">
                    <div class="col-lg-6 reveal">
                        <p class="eyebrow">Available for freelance projects</p>
                        <h1>Building digital products that feel <span>fast, clean, and alive</span></h1>
                        <p class="hero-text">
                            I design and develop responsive websites with modern UI, strong performance, and user-first interaction.
                            From idea to deployment, I create complete web experiences.
                        </p>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="#projects" class="btn btn-brand">View Work</a>
                            <a href="#contact" class="btn btn-ghost">Hire Me</a>
                        </div>
                        <div class="hero-meta mt-4">
                            <span><i class="fa-solid fa-location-dot"></i> Ranchi, India</span>
                            <span><i class="fa-solid fa-envelope"></i> hello@aaravcode.dev</span>
                        </div>
                    </div>

                    <div class="col-lg-6 reveal">
                        <div class="hero-card">
                            <div class="swiper hero-swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="./imag/slider/1.png" alt="Showcase slide one" class="img-fluid" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="./imag/slider/2.png" alt="Showcase slide two" class="img-fluid" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="./imag/slider/3.png" alt="Showcase slide three" class="img-fluid" />
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="./imag/slider/4.png" alt="Showcase slide four" class="img-fluid" />
                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="floating-badge badge-1">
                                <i class="fa-solid fa-code"></i> Full Stack
                            </div>
                            <div class="floating-badge badge-2">
                                <i class="fa-solid fa-bolt"></i> Fast UI
                            </div>
                        </div>
                    </div>
                </div>

                <div class="stats-panel reveal">
                    <div class="stat-box">
                        <h3 data-target="400">0</h3>
                        <p>Projects Delivered</p>
                    </div>
                    <div class="stat-box">
                        <h3 data-target="3">0</h3>
                        <p>Years Experience</p>
                    </div>
                    <div class="stat-box">
                        <h3 data-target="25">0</h3>
                        <p>Happy Clients</p>
                    </div>
                    <div class="stat-box">
                        <h3 data-target="99">0</h3>
                        <p>Performance Score</p>
                    </div>
                </div>
            </div>
        </section>

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

       <?php require_once './includes/skillsection.php'; ?>

        <section class="section-space" id="projects">
            <div class="container">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-2 mb-4 reveal">
                    <div>
                        <p class="section-tag">Portfolio</p>
                        <h2 class="section-title">Selected Work</h2>
                    </div>
                    <a href="#contact" class="btn btn-sm btn-brand">Start a Project</a>
                </div>

                <div class="row g-4">
                    <div class="col-md-6 col-lg-4 reveal">
                        <article class="project-card">
                            <img src="./imag/slider.png" alt="E-commerce project" class="img-fluid" />
                            <div class="project-body">
                                <p class="project-type">Web App</p>
                                <h5>E-commerce Storefront</h5>
                                <p>Responsive shopping interface with clean navigation and conversion-focused design.</p>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-6 col-lg-4 reveal">
                        <article class="project-card">
                            <img src="./imag/slider3.png" alt="Personal brand project" class="img-fluid" />
                            <div class="project-body">
                                <p class="project-type">Brand Site</p>
                                <h5>Creator Portfolio</h5>
                                <p>Bold personal brand website designed for storytelling, speed, and strong visual impact.</p>
                            </div>
                        </article>
                    </div>

                    <div class="col-md-6 col-lg-4 reveal">
                        <article class="project-card">
                            <img src="./imag/popup5.png" alt="Dashboard project" class="img-fluid" />
                            <div class="project-body">
                                <p class="project-type">Dashboard</p>
                                <h5>Analytics UI</h5>
                                <p>Interactive dashboard with responsive cards, status blocks, and actionable insights.</p>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-space contact-section" id="contact">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-5 reveal">
                        <p class="section-tag">Contact</p>
                        <h2 class="section-title">Let us build your next website</h2>
                        <p class="section-text">Tell me your goals and timeline. I will reply with a clear plan, timeline, and budget estimate.</p>
                        <div class="contact-list">
                            <p><i class="fa-solid fa-envelope"></i> hello@aaravcode.dev</p>
                            <p><i class="fa-solid fa-phone"></i> +91 999-000-9999</p>
                            <p><i class="fa-solid fa-location-dot"></i> Ranchi, Jharkhand</p>
                        </div>
                    </div>

                    <div class="col-lg-7 reveal">
                        <form class="contact-form" id="contactForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Your Name" required />
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Email Address" required />
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" placeholder="Project Type" />
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="5" placeholder="Tell me about your project" required></textarea>
                                </div>
                                <div class="col-12 d-flex justify-content-between align-items-center flex-wrap gap-3">
                                    <button type="submit" class="btn btn-brand">Send Message</button>
                                    <span class="form-note" id="formMessage">I usually reply within 24 hours.</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require_once './includes/footer.php'; ?>
</body>

</html>