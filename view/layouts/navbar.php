<!-- Premium Corporate Navbar -->
<nav class="navbar navbar-expand-lg fixed-top premium-navbar" id="hmsNavbar">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <div class="logo-circle">
                <i class="fa-solid fa-heart-pulse"></i>
            </div>
            <div class="ms-2">
                <span class="logo-title">
                    Smart Hospital
                </span>
                <small class="logo-subtitle d-block">
                    Healthcare For Everyone
                </small>
            </div>
        </a>

        <!-- Mobile Toggler -->
        <button class="navbar-toggler border-0 shadow-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMenu"
            aria-controls="navbarMenu"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars fs-3"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">

            <!-- Nav Links -->
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">
                        <i class="fa-solid fa-house nav-icon"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">
                        <i class="fa-solid fa-hospital nav-icon"></i>
                        <span>About</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">
                        <i class="fa-solid fa-briefcase-medical nav-icon"></i>
                        <span>Services</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=doctors">
                        <i class="fa-solid fa-user-doctor nav-icon"></i>
                        <span>Doctors</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#departments">
                        <i class="fa-solid fa-layer-group nav-icon"></i>
                        <span>Departments</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">
                        <i class="fa-solid fa-phone-volume nav-icon"></i>
                        <span>Contact</span>
                    </a>
                </li>
            </ul>

            <!-- Action Buttons -->
            <div class="d-flex align-items-center gap-2 nav-actions">
                <a href="index.php?page=login"
                    class="btn login-btn">
                    <i class="fa-solid fa-right-to-bracket me-1"></i>
                    Login
                </a>
                <a href="index.php?page=register"
                    class="btn register-btn">
                    <i class="fa-solid fa-user-plus me-1"></i>
                    Register
                </a>
                <a href="index.php?page=appointment"
                    class="btn appointment-btn">
                    <i class="fa-solid fa-calendar-check me-2"></i>
                    Book Appointment
                </a>
            </div>

        </div>
    </div>
</nav>

<!-- Navbar spacer to offset fixed-top height (prevents content from hiding under navbar) -->
<div class="navbar-spacer"></div>

<!-- Scoped Premium Navbar Styles -->
<style>
    .premium-navbar {
        --nav-h: 84px;
        padding: 0;
        height: var(--nav-h);
        background: rgba(13, 24, 46, 0.55);
        backdrop-filter: blur(16px) saturate(160%);
        -webkit-backdrop-filter: blur(16px) saturate(160%);
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        transition: all 0.35s ease;
        z-index: 1030;
    }

    .premium-navbar.hms-scrolled {
        --nav-h: 68px;
        background: rgba(8, 16, 34, 0.85);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.18);
        border-bottom-color: rgba(255, 255, 255, 0.12);
    }

    .premium-navbar .container {
        height: 100%;
        display: flex;
        align-items: center;
    }

    /* Logo */
    .premium-navbar .navbar-brand {
        display: flex;
        align-items: center;
    }

    .premium-navbar .logo-circle {
        width: 46px;
        height: 46px;
        min-width: 46px;
        border-radius: 50%;
        background: linear-gradient(135deg, #0d6efd, #20c997);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1.15rem;
        box-shadow: 0 6px 16px rgba(13, 110, 253, 0.35);
    }

    .premium-navbar .logo-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 1.15rem;
        color: #ffffff;
        line-height: 1.1;
        letter-spacing: 0.2px;
    }

    .premium-navbar .logo-subtitle {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        font-size: 0.68rem;
        color: rgba(255, 255, 255, 0.65);
        letter-spacing: 0.3px;
    }

    /* Nav Links */
    .premium-navbar .navbar-nav .nav-item {
        margin: 0 4px;
    }

    .premium-navbar .nav-link {
        position: relative;
        display: flex;
        align-items: center;
        gap: 7px;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        font-size: 0.92rem;
        color: rgba(255, 255, 255, 0.85) !important;
        padding: 10px 6px !important;
        transition: color 0.25s ease;
    }

    .premium-navbar .nav-link .nav-icon {
        font-size: 0.8rem;
        color: #20c997;
        opacity: 0.85;
        transition: transform 0.25s ease;
    }

    .premium-navbar .nav-link::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 2px;
        width: 0;
        height: 2px;
        border-radius: 2px;
        background: linear-gradient(90deg, #0d6efd, #20c997);
        transition: width 0.3s ease;
    }

    .premium-navbar .nav-link:hover,
    .premium-navbar .nav-link.active {
        color: #ffffff !important;
    }

    .premium-navbar .nav-link:hover .nav-icon,
    .premium-navbar .nav-link.active .nav-icon {
        transform: translateY(-2px);
    }

    .premium-navbar .nav-link:hover::after,
    .premium-navbar .nav-link.active::after {
        width: 100%;
    }

    /* Buttons */
    .premium-navbar .nav-actions {
        margin-left: 12px;
    }

    .premium-navbar .btn {
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        font-size: 0.86rem;
        padding: 9px 18px;
        border-radius: 50px;
        transition: all 0.25s ease;
        white-space: nowrap;
    }

    .premium-navbar .login-btn {
        background: rgba(255, 255, 255, 0.1);
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.25);
    }

    .premium-navbar .login-btn:hover {
        background: rgba(255, 255, 255, 0.2);
        color: #ffffff;
    }

    .premium-navbar .register-btn {
        background: transparent;
        color: #ffffff;
        border: 1px solid #20c997;
    }

    .premium-navbar .register-btn:hover {
        background: #20c997;
        color: #08182c;
    }

    .premium-navbar .appointment-btn {
        background: linear-gradient(135deg, #0d6efd, #084298);
        color: #ffffff;
        border: none;
        box-shadow: 0 6px 16px rgba(13, 110, 253, 0.4);
    }

    .premium-navbar .appointment-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 22px rgba(13, 110, 253, 0.5);
        color: #ffffff;
    }

    /* Spacer */
    .navbar-spacer {
        height: 84px;
    }

    /* Mobile Toggler */
    .premium-navbar .navbar-toggler i {
        color: #ffffff;
    }

    /* Responsive */
    @media (max-width: 991.98px) {
        .premium-navbar .navbar-collapse {
            background: rgba(8, 16, 34, 0.97);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            margin-top: 14px;
            padding: 18px;
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .premium-navbar .navbar-nav {
            margin-bottom: 14px;
        }

        .premium-navbar .nav-item {
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        }

        .premium-navbar .nav-link {
            padding: 12px 4px !important;
        }

        .premium-navbar .nav-link::after {
            display: none;
        }

        .premium-navbar .nav-actions {
            flex-direction: column;
            align-items: stretch !important;
            margin-left: 0;
            gap: 10px !important;
        }

        .premium-navbar .nav-actions .btn {
            width: 100%;
            text-align: center;
        }
    }
</style>

<!-- Scoped Navbar Behavior (scroll shrink + active link on scroll) -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var navbar = document.getElementById('hmsNavbar');

        if (navbar) {
            var onScroll = function () {
                if (window.scrollY > 40) {
                    navbar.classList.add('hms-scrolled');
                } else {
                    navbar.classList.remove('hms-scrolled');
                }
            };
            window.addEventListener('scroll', onScroll);
            onScroll();
        }

        // Auto-close mobile menu on link click
        var navLinks = document.querySelectorAll('#navbarMenu .nav-link');
        var collapseEl = document.getElementById('navbarMenu');
        navLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                if (collapseEl.classList.contains('show') && typeof bootstrap !== 'undefined') {
                    var bsCollapse = bootstrap.Collapse.getInstance(collapseEl) || new bootstrap.Collapse(collapseEl);
                    bsCollapse.hide();
                }
            });
        });
    });
</script>