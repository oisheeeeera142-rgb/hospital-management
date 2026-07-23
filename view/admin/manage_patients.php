<link rel="stylesheet" href="public/css/dashboard.css">

<?php include 'view/layouts/header.php'; ?>
<div class="dashboard-layout">
<?php include 'view/layouts/sidebar.php'; ?>

    <div class="main-content">
<div class="main-content">

    <!-- =========================
        PAGE HEADER
    ========================== -->

    <div class="page-header">

        <div>

            <span class="page-breadcrumb">
                Dashboard / Patients
            </span>

            <h2 class="page-title">

                <i class="fas fa-hospital-user"></i>

                Manage Patients

            </h2>

            <p class="page-description">

                View and manage all registered patients.

            </p>

        </div>

        <div>

            <button class="btn btn-primary shadow-sm">

                <i class="fas fa-users me-2"></i>

                Patient Management

            </button>

        </div>

    </div>

    <!-- =========================
        SUMMARY
    ========================== -->

    <?php

    $totalPatients = count($patients);

    $activePatients = 0;

    $blockedPatients = 0;

    foreach($patients as $patient){

        if($patient['status']=="active"){

            $activePatients++;

        }else{

            $blockedPatients++;

        }

    }

    ?>

    <div class="row g-4 mb-4">

        <!-- Total -->

        <div class="col-xl-4 col-md-6">

            <div class="summary-card total-card">

                <div class="summary-icon">

                    <i class="fas fa-users"></i>

                </div>

                <div>

                    <small>Total Patients</small>

                    <h3><?= $totalPatients ?></h3>

                </div>

            </div>

        </div>

        <!-- Active -->

        <div class="col-xl-4 col-md-6">

            <div class="summary-card approved-card">

                <div class="summary-icon">

                    <i class="fas fa-user-check"></i>

                </div>

                <div>

                    <small>Active Patients</small>

                    <h3><?= $activePatients ?></h3>

                </div>

            </div>

        </div>

        <!-- Blocked -->

        <div class="col-xl-4 col-md-6">

            <div class="summary-card pending-card">

                <div class="summary-icon">

                    <i class="fas fa-user-lock"></i>

                </div>

                <div>

                    <small>Blocked Patients</small>

                    <h3><?= $blockedPatients ?></h3>

                </div>

            </div>

        </div>

    </div>

    <!-- =========================
        SEARCH BAR
    ========================== -->

    <div class="dashboard-card premium-card mb-4">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <div class="search-box">

                    <i class="fas fa-search"></i>

                    <input

                        type="text"

                        id="patientSearch"

                        class="form-control"

                        placeholder="Search patient, email, phone...">

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

    <!-- =========================
        TABLE CARD
    ========================== -->

    <div class="dashboard-card premium-card">

        <div class="card-header-custom">

            <div>

                <h4>

                    <i class="fas fa-hospital-user text-primary me-2"></i>

                    Registered Patients

                </h4>

                <span>

                    Total Patients :

                    <strong><?= $totalPatients ?></strong>

                </span>

            </div>

        </div>

        <div class="table-responsive">

            
<table class="table premium-table align-middle" id="patientTable">

    <thead>

        <tr>

            <th>#</th>

            <th>Patient</th>

            <th>Contact</th>

            <th>Gender</th>

            <th>Age</th>

            <th>Address</th>

            <th>Status</th>

            <th class="text-center">Actions</th>

        </tr>

    </thead>

    <tbody>

    <?php if(!empty($patients)): ?>

    <?php foreach($patients as $patient): ?>

    <tr>

        <!-- ID -->

        <td>

            <span class="table-id">

                #<?= $patient['id']; ?>

            </span>

        </td>

        <!-- Patient -->

        <td>

            <div class="table-user">

                <div class="avatar patient-avatar">

                    <i class="fas fa-user"></i>

                </div>

                <div>

                    <strong>

                        <?= htmlspecialchars($patient['full_name']); ?>

                    </strong>

                    <br>

                    <small class="text-muted">

                        User ID :
                        <?= $patient['user_id']; ?>

                    </small>

                </div>

            </div>

        </td>

        <!-- Contact -->

        <td>

            <div class="contact-info">

                <div>

                    <i class="fas fa-envelope text-primary me-2"></i>

                    <?= htmlspecialchars($patient['email']); ?>

                </div>

                <div class="mt-2">

                    <i class="fas fa-phone text-success me-2"></i>

                    <?= htmlspecialchars($patient['phone']); ?>

                </div>

            </div>

        </td>

        <!-- Gender -->

        <td>

            <?php

            $gender = strtolower($patient['gender']);

            if($gender=="male"){

                echo '<span class="gender-badge male"><i class="fas fa-mars"></i> Male</span>';

            }elseif($gender=="female"){

                echo '<span class="gender-badge female"><i class="fas fa-venus"></i> Female</span>';

            }else{

                echo '<span class="gender-badge other"><i class="fas fa-user"></i> '.htmlspecialchars($patient['gender']).'</span>';

            }

            ?>

        </td>

        <!-- Age -->

        <td>

            <span class="age-pill">

                <i class="fas fa-cake-candles me-1"></i>

                <?= htmlspecialchars($patient['age']); ?> Years

            </span>

        </td>

        <!-- Address -->

        <td>

            <span class="address-pill">

                <i class="fas fa-location-dot me-1"></i>

                <?= htmlspecialchars($patient['address']); ?>

            </span>

        </td>

        <!-- Status -->

        <td>

            <?php if($patient['status']=="active"): ?>

                <span class="status approved">

                    <i class="fas fa-circle-check"></i>

                    Active

                </span>

            <?php else: ?>

                <span class="status rejected">

                    <i class="fas fa-user-lock"></i>

                    Blocked

                </span>

            <?php endif; ?>

        </td>

        <!-- Actions -->

        <td>

            <div class="action-buttons">

                <a

                    href="index.php?page=approve-patient&id=<?= $patient['user_id']; ?>"

                    class="btn btn-success btn-action"

                    title="Approve Patient">

                    <i class="fas fa-check"></i>

                </a>

                <a

                    href="index.php?page=delete-patient&id=<?= $patient['user_id']; ?>"

                    class="btn btn-danger btn-action"

                    title="Delete Patient"

                    onclick="return confirm('Delete this patient?')">

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

                <i class="fas fa-users"></i>

                <h4>No Patients Found</h4>

                <p>

                    There are currently no registered patients.

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

const patientSearch = document.getElementById("patientSearch");

if(patientSearch){

patientSearch.addEventListener("keyup",function(){

let value=this.value.toLowerCase();

document.querySelectorAll("#patientTable tbody tr").forEach(function(row){

row.style.display=row.innerText.toLowerCase().includes(value)?"":"none";

});

});

}

</script>
<?php include 'view/layouts/footer.php'; ?>