<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Smart Hospital Management System | Modern Healthcare Platform</title>

    <!-- SEO Meta Tags -->
    <meta name="description"
        content="Smart Hospital Management System - Modern Healthcare Platform">
    <meta name="keywords"
        content="hospital management system, smart hospital, healthcare platform, patient management, appointment booking, hospital software">
    <meta name="author" content="Smart Hospital Management System">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#0d6efd">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Smart Hospital Management System">
    <meta property="og:description" content="Smart Hospital Management System - Modern Healthcare Platform">
    <meta property="og:image" content="public/images/og-cover.jpg">
    <meta property="og:site_name" content="Smart Hospital Management System">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Smart Hospital Management System">
    <meta name="twitter:description" content="Smart Hospital Management System - Modern Healthcare Platform">
    <meta name="twitter:image" content="public/images/og-cover.jpg">

    <!-- Favicon (update path if you have an actual icon asset) -->
    <link rel="icon" type="image/png" href="public/images/favicon.png">

    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- AOS Animation -->
    <link rel="stylesheet"
        href="https://unpkg.com/aos@2.3.4/dist/aos.css">

    <!-- Animate.css -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Swiper -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="public/css/style.css">

    <!-- Premium Hospital Theme Foundation (scoped inline, does not alter style.css) -->
    <style>
        :root {
            --hms-primary: #0d6efd;
            --hms-primary-dark: #084298;
            --hms-primary-light: #e7f1ff;
            --hms-accent: #20c997;
            --hms-white: #ffffff;
            --hms-soft-gray: #f4f7fb;
            --hms-text-dark: #1e2a3a;
            --hms-text-muted: #6c7a89;
            --hms-border: #e3e8f0;
            --hms-shadow: 0 10px 30px rgba(13, 110, 253, 0.08);
            --hms-radius: 14px;
            --hms-font: 'Poppins', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body.hospital-body {
            font-family: var(--hms-font);
            background-color: var(--hms-soft-gray);
            color: var(--hms-text-dark);
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }

        /* Scrollbar */
        body.hospital-body::-webkit-scrollbar {
            width: 8px;
        }

        body.hospital-body::-webkit-scrollbar-track {
            background: var(--hms-soft-gray);
        }

        body.hospital-body::-webkit-scrollbar-thumb {
            background: var(--hms-primary);
            border-radius: 10px;
        }

        /* Preloader */
        #hms-preloader {
            position: fixed;
            inset: 0;
            z-index: 99999;
            background: var(--hms-white);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.4s ease, visibility 0.4s ease;
        }

        #hms-preloader .hms-spinner {
            width: 48px;
            height: 48px;
            border: 4px solid var(--hms-primary-light);
            border-top-color: var(--hms-primary);
            border-radius: 50%;
            animation: hms-spin 0.8s linear infinite;
        }

        @keyframes hms-spin {
            to { transform: rotate(360deg); }
        }

        #hms-preloader.hms-loaded {
            opacity: 0;
            visibility: hidden;
        }
        .dashboard-layout{
    display:flex;
    min-height:100vh;
}

.main-content{
    flex:1;
    min-width:0;
    padding:30px;
    background:#f5f7fb;
    overflow-x:auto;
}
    </style>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Chart JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</head>

<body class="hospital-body">

    <!-- Preloader (optional premium touch — safe to remove if not needed) -->
    <div id="hms-preloader">
        <div class="hms-spinner"></div>
    </div>
    <script>
        window.addEventListener('load', function () {
            var preloader = document.getElementById('hms-preloader');
            if (preloader) {
                preloader.classList.add('hms-loaded');
            }
        });
    </script>