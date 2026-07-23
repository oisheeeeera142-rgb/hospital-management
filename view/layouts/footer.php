
<!-- Corporate Hospital Footer -->
<footer class="hms-footer">

    <div class="footer-main">
        <div class="container">
            <div class="row g-4">

                <!-- Hospital Logo + About -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-brand d-flex align-items-center mb-3">
                        <div class="footer-logo-circle">
                            <i class="fa-solid fa-heart-pulse"></i>
                        </div>
                        <div class="ms-2">
                            <span class="footer-logo-title d-block">Smart Hospital</span>
                            <small class="footer-logo-subtitle">Healthcare For Everyone</small>
                        </div>
                    </div>
                    <p class="footer-about">
                        Smart Hospital is committed to delivering compassionate,
                        world-class healthcare through modern technology, expert
                        doctors, and patient-first services available around the clock.
                    </p>
                    <div class="footer-socials">
                        <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6">
                    <h6 class="footer-heading">Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="index.php"><i class="fa-solid fa-chevron-right"></i> Home</a></li>
                        <li><a href="#about"><i class="fa-solid fa-chevron-right"></i> About Us</a></li>
                        <li><a href="#services"><i class="fa-solid fa-chevron-right"></i> Services</a></li>
                        <li><a href="index.php?page=doctors"><i class="fa-solid fa-chevron-right"></i> Doctors</a></li>
                        <li><a href="#contact"><i class="fa-solid fa-chevron-right"></i> Contact</a></li>
                    </ul>
                </div>

                <!-- Departments -->
                <div class="col-lg-3 col-md-6">
                    <h6 class="footer-heading">Departments</h6>
                    <ul class="footer-links">
                        <li><a href="#departments"><i class="fa-solid fa-chevron-right"></i> Cardiology</a></li>
                        <li><a href="#departments"><i class="fa-solid fa-chevron-right"></i> Neurology</a></li>
                        <li><a href="#departments"><i class="fa-solid fa-chevron-right"></i> Orthopedics</a></li>
                        <li><a href="#departments"><i class="fa-solid fa-chevron-right"></i> Pediatrics</a></li>
                        <li><a href="#departments"><i class="fa-solid fa-chevron-right"></i> Radiology</a></li>
                    </ul>
                </div>

                <!-- Emergency Contact + Newsletter -->
                <div class="col-lg-3 col-md-6">
                    <h6 class="footer-heading">Emergency Contact</h6>
                    <ul class="footer-contact">
                        <li>
                            <i class="fa-solid fa-phone-volume"></i>
                            <div>
                                <span class="d-block small-label">24/7 Emergency</span>
                                <a href="tel:+8801234567890">+880 1234-567890</a>
                            </div>
                        </li>
                        <li>
                            <i class="fa-solid fa-envelope"></i>
                            <div>
                                <span class="d-block small-label">Email Us</span>
                                <a href="mailto:info@smarthospital.com">info@smarthospital.com</a>
                            </div>
                        </li>
                        <li>
                            <i class="fa-solid fa-location-dot"></i>
                            <div>
                                <span class="d-block small-label">Visit Us</span>
                                <span>123 Health Avenue, Dhaka, BD</span>
                            </div>
                        </li>
                    </ul>

                    <h6 class="footer-heading mt-3">Newsletter</h6>
                    <form class="footer-newsletter" id="hmsNewsletterForm">
                        <input type="email" class="form-control" placeholder="Your email address" required>
                        <button type="submit" class="btn">
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="footer-bottom">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
            <p class="mb-0">
                &copy; <?php echo date('Y'); ?> Smart Hospital Management System. All Rights Reserved.
            </p>
            <p class="mb-0 footer-credit">
                Designed with <i class="fa-solid fa-heart text-danger"></i> for better healthcare
            </p>
        </div>
    </div>

</footer>

<!-- Floating Action Buttons -->
<div class="hms-floating-buttons">
    <a href="tel:+8801234567890" class="hms-float-btn emergency-btn" aria-label="Emergency Call">
        <i class="fa-solid fa-phone-volume"></i>
        <span class="pulse-ring"></span>
    </a>
    <a href="https://wa.me/8801234567890" target="_blank" rel="noopener" class="hms-float-btn whatsapp-btn" aria-label="Chat on WhatsApp">
        <i class="fa-brands fa-whatsapp"></i>
    </a>
    <button type="button" class="hms-float-btn back-to-top-btn" id="hmsBackToTop" aria-label="Back to top">
        <i class="fa-solid fa-arrow-up"></i>
    </button>
</div>

<!-- Scoped Footer Styles -->
<style>
    .hms-footer {
        background: linear-gradient(180deg, #0a1f44 0%, #071530 100%);
        color: rgba(255, 255, 255, 0.75);
        font-family: 'Poppins', sans-serif;
        margin-top: 60px;
    }

    .footer-main {
        padding: 60px 0 30px 0;
    }

    .footer-brand .footer-logo-circle {
        width: 44px;
        height: 44px;
        min-width: 44px;
        border-radius: 50%;
        background: linear-gradient(135deg, #0d6efd, #20c997);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1.1rem;
    }

    .footer-logo-title {
        color: #ffffff;
        font-weight: 700;
        font-size: 1.1rem;
    }

    .footer-logo-subtitle {
        color: rgba(255, 255, 255, 0.55);
        font-size: 0.7rem;
    }

    .footer-about {
        font-size: 0.88rem;
        line-height: 1.7;
        color: rgba(255, 255, 255, 0.6);
    }

    .footer-socials a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
        color: #ffffff;
        margin-right: 8px;
        transition: all 0.25s ease;
    }

    .footer-socials a:hover {
        background: linear-gradient(135deg, #0d6efd, #20c997);
        transform: translateY(-3px);
    }

    .footer-heading {
        color: #ffffff;
        font-weight: 600;
        font-size: 1rem;
        margin-bottom: 18px;
        position: relative;
        padding-bottom: 10px;
    }

    .footer-heading::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 34px;
        height: 3px;
        border-radius: 3px;
        background: linear-gradient(90deg, #0d6efd, #20c997);
    }

    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 10px;
    }

    .footer-links a {
        color: rgba(255, 255, 255, 0.65);
        text-decoration: none;
        font-size: 0.88rem;
        transition: all 0.2s ease;
    }

    .footer-links a i {
        font-size: 0.65rem;
        margin-right: 6px;
        color: #20c997;
    }

    .footer-links a:hover {
        color: #ffffff;
        padding-left: 4px;
    }

    .footer-contact {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-contact li {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 14px;
    }

    .footer-contact li i {
        color: #20c997;
        font-size: 1rem;
        margin-top: 3px;
    }

    .footer-contact .small-label {
        font-size: 0.72rem;
        color: rgba(255, 255, 255, 0.5);
    }

    .footer-contact a {
        color: #ffffff;
        text-decoration: none;
        font-size: 0.88rem;
        font-weight: 500;
    }

    .footer-contact span {
        font-size: 0.85rem;
        color: rgba(255, 255, 255, 0.8);
    }

    .footer-newsletter {
        display: flex;
        gap: 8px;
    }

    .footer-newsletter .form-control {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: #ffffff;
        font-size: 0.85rem;
        border-radius: 50px;
        padding: 10px 16px;
    }

    .footer-newsletter .form-control::placeholder {
        color: rgba(255, 255, 255, 0.45);
    }

    .footer-newsletter .form-control:focus {
        background: rgba(255, 255, 255, 0.12);
        border-color: #0d6efd;
        box-shadow: none;
        color: #fff;
    }

    .footer-newsletter .btn {
        background: linear-gradient(135deg, #0d6efd, #084298);
        color: #fff;
        border-radius: 50%;
        width: 42px;
        height: 42px;
        min-width: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
    }

    .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        padding: 18px 0;
        font-size: 0.82rem;
        color: rgba(255, 255, 255, 0.5);
    }

    .footer-credit i {
        margin: 0 2px;
    }

    /* Floating Buttons */
    .hms-floating-buttons {
        position: fixed;
        right: 22px;
        bottom: 22px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 14px;
        z-index: 1040;
    }

    .hms-float-btn {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1.3rem;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        transition: all 0.25s ease;
        position: relative;
        border: none;
    }

    .hms-float-btn:hover {
        transform: translateY(-4px) scale(1.05);
        color: #fff;
    }

    .whatsapp-btn {
        background: #25d366;
    }

    .emergency-btn {
        background: #dc3545;
    }

    .back-to-top-btn {
        background: linear-gradient(135deg, #0d6efd, #084298);
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
    }

    .back-to-top-btn.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .pulse-ring {
        position: absolute;
        inset: 0;
        border-radius: 50%;
        border: 2px solid #dc3545;
        animation: hms-pulse 1.6s infinite;
    }

    @keyframes hms-pulse {
        0% { transform: scale(1); opacity: 0.7; }
        100% { transform: scale(1.6); opacity: 0; }
    }

    /* Responsive */
    @media (max-width: 767.98px) {
        .footer-main {
            padding: 40px 0 20px 0;
            text-align: left;
        }

        .hms-floating-buttons {
            right: 14px;
            bottom: 14px;
        }

        .hms-float-btn {
            width: 46px;
            height: 46px;
            font-size: 1.1rem;
        }
    }
</style>

<!-- Existing Scripts (preserved) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/CountUp.js/2.8.0/countUp.umd.min.js"></script>

<script src="public/js/app.js"></script>

<!-- AOS + Swiper init (libraries already loaded in header.php, initialized here) -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            once: true
        });
    }
</script>

<!-- Footer Behavior: Back to Top + Newsletter Submit -->
<script>
    document.addEventListener('DOMContentLoaded', function () {

        // Back to top show/hide + click
        var backToTopBtn = document.getElementById('hmsBackToTop');
        if (backToTopBtn) {
            window.addEventListener('scroll', function () {
                if (window.scrollY > 300) {
                    backToTopBtn.classList.add('show');
                } else {
                    backToTopBtn.classList.remove('show');
                }
            });

            backToTopBtn.addEventListener('click', function () {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }

        // Newsletter form (front-end only placeholder — wire to backend as needed)
        var newsletterForm = document.getElementById('hmsNewsletterForm');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', function (e) {
                e.preventDefault();
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Subscribed!',
                        text: 'Thank you for subscribing to our newsletter.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
                newsletterForm.reset();
            });
        }

    });
</script>

<?php if (isset($_SESSION['success'])): ?>

    <script>
        Swal.fire({
            icon: 'success',
            title: '<?php echo $_SESSION['success']; ?>',
            timer: 2000,
            showConfirmButton: false
        });
    </script>

    <?php unset($_SESSION['success']); ?>
<?php endif; ?>
</body>
</html
