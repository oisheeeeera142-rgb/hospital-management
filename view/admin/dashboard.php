
<link rel="stylesheet" href="public/css/dashboard.css">

<?php include 'view/layouts/header.php'; ?>
<div class="dashboard-layout">
<?php include 'view/layouts/sidebar.php'; ?>



    <div class="main-content">

        <!-- Dashboard Header -->
        <div class="dashboard-header mb-4">
            <div>
                <h2 class="fw-bold mb-1">
                    Welcome Back, Admin 👋
                </h2>

                <p class="text-muted mb-0">
                    Smart Hospital Management Dashboard
                </p>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row g-4">

            <!-- Doctors -->
            <div class="col-lg-4 col-md-6">

                <div class="premium-stat-card doctors-card">

                    <div class="stat-icon">
                        <i class="fas fa-user-doctor"></i>
                    </div>

                    <div class="stat-content">

                        <span>Total Doctors</span>

                        <h2>
                            <?php echo $totalDoctors; ?>
                        </h2>

                    </div>

                </div>

            </div>

            <!-- Patients -->
            <div class="col-lg-4 col-md-6">

                <div class="premium-stat-card patients-card">

                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>

                    <div class="stat-content">

                        <span>Total Patients</span>

                        <h2>
                            <?php echo $totalPatients; ?>
                        </h2>

                    </div>

                </div>

            </div>

            <!-- Appointments -->
            <div class="col-lg-4 col-md-12">

                <div class="premium-stat-card appointments-card">

                    <div class="stat-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>

                    <div class="stat-content">

                        <span>Total Appointments</span>

                        <h2>
                            <?php echo $totalAppointments; ?>
                        </h2>

                    </div>

                </div>

            </div>

        </div>

        <!-- Analytics Card -->
        <div class="premium-chart-card mt-5">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h4 class="fw-bold mb-1">
                        Hospital Analytics
                    </h4>

                    <p class="text-muted mb-0">
                        Doctors, Patients & Appointments Overview
                    </p>

                </div>

            </div>

            <canvas id="appointmentChart" height="110"></canvas>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(document.getElementById('appointmentChart'), {

    type: 'bar',

    data: {

        labels: [
            'Doctors',
            'Patients',
            'Appointments'
        ],

        datasets: [{

            label: 'Hospital Statistics',

            data: [

                <?php echo $totalDoctors; ?>,

                <?php echo $totalPatients; ?>,

                <?php echo $totalAppointments; ?>

            ],

            backgroundColor: [

                '#0d6efd',

                '#20c997',

                '#ffc107'

            ],

            borderRadius: 12

        }]

    },

    options: {

        responsive: true,

        plugins: {

            legend: {

                display: false

            }

        },

        scales: {

            y: {

                beginAtZero: true

            }

        }

    }

});

</script>

<?php include 'view/layouts/footer.php'; ?>