<link rel="stylesheet" href="public/css/dashboard.css">
<?php include 'view/layouts/header.php'; ?>
<div class="dashboard-layout">
<?php include 'view/layouts/sidebar.php'; ?>

    <div class="main-content">

<div class="main-content">

    <!-- ===========================
         PAGE HEADER
    ============================ -->

    <div class="page-header">

        <div>

            <span class="page-breadcrumb">
                Dashboard / Doctors
            </span>

            <h2 class="page-title">

                <i class="fas fa-user-doctor"></i>

                Manage Doctors

            </h2>

            <p class="page-description">

                Review, approve and manage registered doctors.

            </p>

        </div>

        <div class="page-header-right">

            <button class="btn btn-primary shadow-sm">

                <i class="fas fa-user-plus me-2"></i>

                Doctor Management

            </button>

        </div>

    </div>


    <!-- ===========================
         SUMMARY CARDS
    ============================ -->

    <?php

    $totalDoctors = count($doctors);

    $pendingDoctors = 0;

    $activeDoctors = 0;

    foreach($doctors as $doctor){

        if($doctor['status']=="pending"){

            $pendingDoctors++;

        }else{

            $activeDoctors++;

        }

    }

    ?>

    <div class="row g-4 mb-4">

        <!-- Total -->

        <div class="col-xl-4 col-md-6">

            <div class="summary-card total-card">

                <div class="summary-icon">

                    <i class="fas fa-user-doctor"></i>

                </div>

                <div>

                    <small>Total Doctors</small>

                    <h3><?= $totalDoctors ?></h3>

                </div>

            </div>

        </div>

        <!-- Pending -->

        <div class="col-xl-4 col-md-6">

            <div class="summary-card pending-card">

                <div class="summary-icon">

                    <i class="fas fa-user-clock"></i>

                </div>

                <div>

                    <small>Pending Approval</small>

                    <h3><?= $pendingDoctors ?></h3>

                </div>

            </div>

        </div>

        <!-- Active -->

        <div class="col-xl-4 col-md-12">

            <div class="summary-card approved-card">

                <div class="summary-icon">

                    <i class="fas fa-user-check"></i>

                </div>

                <div>

                    <small>Active Doctors</small>

                    <h3><?= $activeDoctors ?></h3>

                </div>

            </div>

        </div>

    </div>


    <!-- ===========================
         SEARCH BAR
    ============================ -->

    <div class="dashboard-card premium-card mb-4">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <div class="search-box">

                    <i class="fas fa-search"></i>

                    <input

                        type="text"

                        id="doctorSearch"

                        class="form-control"

                        placeholder="Search doctor, specialization, degree...">

                </div>

            </div>

            <div class="col-lg-4 text-end">

                <button class="btn btn-outline-primary">

                    <i class="fas fa-filter me-2"></i>

                    Filter

                </button>

            </div>

        </div>

    </div>


    <!-- ===========================
         TABLE CARD
    ============================ -->

    <div class="dashboard-card premium-card">

        <div class="card-header-custom">

            <div>

                <h4>

                    <i class="fas fa-stethoscope text-primary me-2"></i>

                    Registered Doctors

                </h4>

                <span>

                    Total Doctors :

                    <strong><?= $totalDoctors ?></strong>

                </span>

            </div>

        </div>

        <div class="table-responsive">

            <table class="table premium-table align-middle" id="doctorTable">

    <thead>

        <tr>

            <th>#</th>

            <th>Doctor</th>

            <th>Contact</th>

            <th>Specialization</th>

            <th>Qualification</th>

            <th>Experience</th>

            <th>Status</th>

            <th class="text-center">Actions</th>

        </tr>

    </thead>

    <tbody>

    <?php if(!empty($doctors)): ?>

    <?php foreach($doctors as $doctor): ?>

    <tr>

        <!-- ID -->

        <td>

            <span class="table-id">

                #<?= $doctor['id']; ?>

            </span>

        </td>

        <!-- Doctor -->

        <td>

            <div class="table-user">

                <div class="avatar doctor-avatar">

                    <i class="fas fa-user-doctor"></i>

                </div>

                <div>

                    <strong>

                        <?= $doctor['full_name']; ?>

                    </strong>

                    <br>

                    <small class="text-muted">

                        ID :
                        <?= $doctor['user_id']; ?>

                    </small>

                </div>

            </div>

        </td>

        <!-- Contact -->

        <td>

            <div>

                <div>

                    <i class="fas fa-envelope text-primary me-2"></i>

                    <?= $doctor['email']; ?>

                </div>

                <div class="mt-2">

                    <i class="fas fa-phone text-success me-2"></i>

                    <?= $doctor['phone']; ?>

                </div>

            </div>

        </td>

        <!-- Specialization -->

        <td>

            <span class="specialization-badge">

                <?= $doctor['specialization']; ?>

            </span>

        </td>

        <!-- Degree -->

        <td>

            <span class="degree-badge">

                <?= $doctor['degree']; ?>

            </span>

        </td>

        <!-- Experience -->

        <td>

            <span class="experience-pill">

                <i class="fas fa-briefcase-medical me-1"></i>

                <?= $doctor['experience']; ?>

            </span>

        </td>

        <!-- Status -->

        <td>

            <?php if($doctor['status']=="pending"): ?>

                <span class="status pending">

                    <i class="fas fa-clock"></i>

                    Pending

                </span>

            <?php else: ?>

                <span class="status approved">

                    <i class="fas fa-circle-check"></i>

                    Active

                </span>

            <?php endif; ?>

        </td>

        <!-- Actions -->

        <td>

            <div class="action-buttons">

                <?php if($doctor['status']=="pending"): ?>

                <a

                href="index.php?page=approve-doctor&id=<?= $doctor['user_id']; ?>"

                class="btn btn-success btn-action"

                title="Approve Doctor">

                    <i class="fas fa-check"></i>

                </a>

                <?php endif; ?>

                <a

                href="index.php?page=reject-doctor&id=<?= $doctor['user_id']; ?>"

                class="btn btn-danger btn-action"

                title="Delete Doctor"

                onclick="return confirm('Delete this doctor?')">

                    <i class="fas fa-trash"></i>

                </a>

            </div>

        </td>

    </tr>

    <?php endforeach; ?>

    <?php else: ?>

    <tr>

        <td colspan="8">

            <div class="empty-state">

                <i class="fas fa-user-doctor"></i>

                <h4>No Doctors Found</h4>

                <p>

                    There are currently no registered doctors.

                </p>

            </div>

        </td>

    </tr>

    <?php endif; ?>

    </tbody>

</table>

        </div>

    </div>

</div>
<script>

document.getElementById("doctorSearch").addEventListener("keyup",function(){

let value=this.value.toLowerCase();

let rows=document.querySelectorAll("#doctorTable tbody tr");

rows.forEach(function(row){

row.style.display=row.innerText.toLowerCase().includes(value)?"":"none";

});

});

</script> 

<?php include 'view/layouts/footer.php'; ?>