
<link rel="stylesheet" href="public/css/dashboard.css">

<?php include 'view/layouts/header.php'; ?>
<div class="dashboard-layout">
<?php include 'view/layouts/sidebar.php'; ?>



    <div class="main-content">

    <main class="main-content">



        <!-- ==========================================
    PREMIUM PAGE HEADER
========================================== -->

<div class="page-header">

    <div>

        <span class="page-breadcrumb">

            Patient Panel / Dashboard

        </span>

        <h2 class="page-title">

            <i class="fas fa-hospital-user"></i>

            Welcome,
            <?= htmlspecialchars($_SESSION['full_name'] ?? 'Patient'); ?>

        </h2>

        <p class="page-description">

            Manage your appointments, prescriptions and health records.

        </p>

    </div>

    <div class="d-flex gap-2">

        <a href="index.php?page=book-appointment"

           class="btn btn-primary shadow-sm">

            <i class="fas fa-calendar-plus me-2"></i>

            Book Appointment

        </a>

    </div>

</div>

<!-- ==========================================
    SEARCH
========================================== -->

<div class="dashboard-card premium-card mb-4">

    <div class="card-header-custom mb-4">

        <div>

            <h4>

                <i class="fas fa-magnifying-glass text-primary me-2"></i>

                Find Your Doctor

            </h4>

            <span>

                Search doctors by name or specialization

            </span>

        </div>

    </div>

    <form method="GET">

        <input type="hidden"

               name="page"

               value="patient-dashboard">

        <div class="row g-3">

            <div class="col-lg-9">

                <div class="search-box">

                    <i class="fas fa-search"></i>

                    <input

                        type="text"

                        name="search"

                        class="form-control"

                        placeholder="Search Doctor, Cardiologist, Dentist ...">

                </div>

            </div>

            <div class="col-lg-3">

                <button

                    class="btn btn-primary w-100">

                    <i class="fas fa-search me-2"></i>

                    Search

                </button>

            </div>

        </div>

    </form>

</div>

<?php

$totalAppointments=count($appointments ?? []);

$totalDoctors=count($doctors ?? []);

$totalPrescriptions=count($prescriptions ?? []);

?>

<!-- ==========================================
    SUMMARY CARDS
========================================== -->

<div class="row g-4 mb-4">

    <div class="col-xl-4 col-md-6">

        <div class="summary-card total-card">

            <div class="summary-icon">

                <i class="fas fa-calendar-check"></i>

            </div>

            <div>

                <small>Total Appointments</small>

                <h3><?= $totalAppointments ?></h3>

            </div>

        </div>

    </div>

    <div class="col-xl-4 col-md-6">

        <div class="summary-card approved-card">

            <div class="summary-icon">

                <i class="fas fa-user-doctor"></i>

            </div>

            <div>

                <small>Available Doctors</small>

                <h3><?= $totalDoctors ?></h3>

            </div>

        </div>

    </div>

    <div class="col-xl-4 col-md-6">

        <div class="summary-card pending-card">

            <div class="summary-icon">

                <i class="fas fa-file-medical"></i>

            </div>

            <div>

                <small>Prescriptions</small>

                <h3><?= $totalPrescriptions ?></h3>

            </div>

        </div>

    </div>

</div>

<!-- ==========================================
    QUICK ACTIONS
========================================== -->

<div class="dashboard-card premium-card mb-4">

    <div class="row text-center">

        <div class="col-lg-3 col-6 mb-3">

            <a href="index.php?page=book-appointment"

               class="quick-action">

                <i class="fas fa-calendar-plus"></i>

                <span>

                    Book

                </span>

            </a>

        </div>

        <div class="col-lg-3 col-6 mb-3">

            <a href="index.php?page=appointment-history"

               class="quick-action">

                <i class="fas fa-calendar-check"></i>

                <span>

                    History

                </span>

            </a>

        </div>

        <div class="col-lg-3 col-6">

            <a href="index.php?page=patient-prescriptions"

               class="quick-action">

                <i class="fas fa-file-medical"></i>

                <span>

                    Prescriptions

                </span>

            </a>

        </div>

        <div class="col-lg-3 col-6">

            <a href="#doctor-list"

               class="quick-action">

                <i class="fas fa-user-doctor"></i>

                <span>

                    Doctors

                </span>

            </a>

        </div>

    </div>

</div>
        
       

                    <!-- ==========================================
    PREMIUM DOCTOR DIRECTORY
========================================== -->

<div class="dashboard-card premium-card" id="doctor-list">

    <div class="card-header-custom mb-4">

        <div>

            <h4>

                <i class="fas fa-user-doctor text-primary me-2"></i>

                Available Doctors

            </h4>

            <span>

                Choose your preferred specialist and book an appointment.

            </span>

        </div>

    </div>

    <div class="row g-4">

        <?php if(!empty($doctors)): ?>

            <?php foreach($doctors as $doctor): ?>

            <div class="col-xl-4 col-lg-6">

                <div class="doctor-card h-100">

                    <!-- Top -->

                    <div class="doctor-top">

                        <div class="doctor-avatar">

                            <i class="fas fa-user-doctor"></i>

                        </div>

                        <div class="doctor-status">

                            <span class="online-dot"></span>

                            Available

                        </div>

                    </div>

                    <!-- Doctor Name -->

                    <h5 class="doctor-name">

                        Dr. <?= htmlspecialchars($doctor['full_name']); ?>

                    </h5>

                    <p class="doctor-speciality">

                        <i class="fas fa-stethoscope me-2"></i>

                        <?= htmlspecialchars($doctor['specialization']); ?>

                    </p>

                    <!-- Information -->

                    <div class="doctor-info">

                        <div>

                            <i class="fas fa-graduation-cap text-primary"></i>

                            <span>

                                <?= htmlspecialchars($doctor['degree'] ?: 'N/A'); ?>

                            </span>

                        </div>

                        <div>

                            <i class="fas fa-award text-warning"></i>

                            <span>

                                <?= htmlspecialchars($doctor['experience'] ?: 'N/A'); ?>

                            </span>

                        </div>

                        <div>

                            <i class="fas fa-location-dot text-danger"></i>

                            <span>

                                <?= htmlspecialchars($doctor['chamber_address'] ?: 'N/A'); ?>

                            </span>

                        </div>

                        <?php if(!empty($doctor['fees'])): ?>

                        <div>

                            <i class="fas fa-money-bill-wave text-success"></i>

                            <span>

                                ৳<?= htmlspecialchars($doctor['fees']); ?>

                            </span>

                        </div>

                        <?php endif; ?>

                        <?php if(!empty($doctor['phone'])): ?>

                        <div>

                            <i class="fas fa-phone text-info"></i>

                            <span>

                                <?= htmlspecialchars($doctor['phone']); ?>

                            </span>

                        </div>

                        <?php endif; ?>

                    </div>

                    <!-- Action -->

                    <a

                    href="index.php?page=book-appointment&doctor_id=<?= $doctor['id']; ?>"

                    class="btn btn-primary w-100 mt-4">

                        <i class="fas fa-calendar-plus me-2"></i>

                        Book Appointment

                    </a>

                </div>

            </div>

            <?php endforeach; ?>

        <?php else: ?>

            <div class="col-12">

                <div class="empty-state">

                    <i class="fas fa-user-doctor"></i>

                    <h4>

                        No Doctors Available

                    </h4>

                    <p>

                        There are currently no doctors available.

                    </p>

                </div>

            </div>

        <?php endif; ?>

    </div>

</div>

<?php include 'view/layouts/footer.php'; ?>