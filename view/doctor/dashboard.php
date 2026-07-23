<link rel="stylesheet" href="public/css/dashboard.css">

<?php include 'view/layouts/header.php'; ?>
<div class="dashboard-layout">
<?php include 'view/layouts/sidebar.php'; ?>
  <div class="main-content">

<div class="main-content">

    <!-- =======================================
        PAGE HEADER
    ======================================== -->

    <div class="page-header">

        <div>

            <span class="page-breadcrumb">

                Doctor Panel / Dashboard

            </span>

            <h2 class="page-title">

                <i class="fas fa-user-doctor"></i>

                Doctor Dashboard

            </h2>

            <p class="page-description">

                Welcome back! Here's an overview of your appointments.

            </p>

        </div>

        <div>

            <button class="btn btn-primary shadow-sm">

                <i class="fas fa-stethoscope me-2"></i>

                My Dashboard

            </button>

        </div>

    </div>

<?php

$totalAppointments = count($appointments);

$pending = 0;
$approved = 0;
$completed = 0;

foreach($appointments as $appointment){

    if($appointment['status']=="pending"){

        $pending++;

    }

    elseif($appointment['status']=="approved"){

        $approved++;

    }

    elseif($appointment['status']=="completed"){

        $completed++;

    }

}

?>

<!-- =======================================
        SUMMARY CARDS
======================================= -->

<div class="row g-4 mb-4">

<div class="col-lg-3 col-md-6">

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

<div class="col-lg-3 col-md-6">

<div class="summary-card pending-card">

<div class="summary-icon">

<i class="fas fa-clock"></i>

</div>

<div>

<small>Pending</small>

<h3><?= $pending ?></h3>

</div>

</div>

</div>

<div class="col-lg-3 col-md-6">

<div class="summary-card approved-card">

<div class="summary-icon">

<i class="fas fa-circle-check"></i>

</div>

<div>

<small>Approved</small>

<h3><?= $approved ?></h3>

</div>

</div>

</div>

<div class="col-lg-3 col-md-6">

<div class="summary-card completed-card">

<div class="summary-icon">

<i class="fas fa-file-medical"></i>

</div>

<div>

<small>Completed</small>

<h3><?= $completed ?></h3>

</div>

</div>

</div>

</div>

<!-- =======================================
        QUICK ACTIONS
======================================= -->

<div class="row mb-4">

<div class="col-lg-8">

<div class="dashboard-card premium-card h-100">

<h4 class="mb-4">

<i class="fas fa-bolt text-warning me-2"></i>

Quick Actions

</h4>

<div class="row g-3">

<div class="col-md-6">

<a href="index.php?page=doctor-appointments"

class="btn btn-primary w-100 py-3">

<i class="fas fa-calendar-check me-2"></i>

Manage Appointments

</a>

</div>

<div class="col-md-6">

<a href="index.php?page=doctor-prescriptions"

class="btn btn-success w-100 py-3">

<i class="fas fa-file-prescription me-2"></i>

Prescriptions

</a>

</div>

</div>

</div>

</div>

<div class="col-lg-4">

<div class="dashboard-card premium-card h-100">

<h4 class="mb-3">

<i class="fas fa-chart-pie text-primary me-2"></i>

Performance

</h4>

<div class="text-center mt-4">

<h1 class="text-primary fw-bold">

<?= $totalAppointments ?>

</h1>

<p class="text-muted">

Total Cases Handled

</p>

</div>

</div>

</div>

</div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx=document.getElementById("doctorChart");

if(ctx){

new Chart(ctx,{

type:"doughnut",

data:{

labels:[

"Pending",

"Approved",

"Completed"

],

datasets:[{

data:[

<?= $pending ?>,

<?= $approved ?>,

<?= $completed ?>

],

backgroundColor:[

"#f59e0b",

"#10b981",

"#3b82f6"

],

borderWidth:0

}]

},

options:{

responsive:true,

plugins:{

legend:{

position:"bottom"

}

},

cutout:"70%"

}

});

}

</script>

<?php include 'view/layouts/footer.php'; ?>