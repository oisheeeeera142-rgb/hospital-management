<link rel="stylesheet" href="public/css/dashboard.css">

<?php include 'view/layouts/header.php'; ?>
<div class="dashboard-layout">
<?php include 'view/layouts/sidebar.php'; ?>

    <div class="main-content">

<div class="main-content">

    <!-- ==========================
         PAGE HEADER
    =========================== -->

    <div class="page-header">

        <div>

            <span class="page-breadcrumb">

                Doctor Panel / Appointments

            </span>

            <h2 class="page-title">

                <i class="fas fa-calendar-check"></i>

                My Appointments

            </h2>

            <p class="page-description">

                View and manage your patient appointments.

            </p>

        </div>

        <div>

            <button class="btn btn-primary shadow-sm">

                <i class="fas fa-user-doctor me-2"></i>

                Doctor Dashboard

            </button>

        </div>

    </div>

<?php

$totalAppointments = count($appointments);

$pendingAppointments = 0;

$approvedAppointments = 0;

$completedAppointments = 0;

foreach($appointments as $appointment){

    if($appointment['status']=="pending"){

        $pendingAppointments++;

    }

    elseif($appointment['status']=="approved"){

        $approvedAppointments++;

    }

    elseif($appointment['status']=="completed"){

        $completedAppointments++;

    }

}

?>

<div class="row g-4 mb-4">

<div class="col-lg-3 col-md-6">

<div class="summary-card total-card">

<div class="summary-icon">

<i class="fas fa-calendar-check"></i>

</div>

<div>

<small>Total</small>

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

<h3><?= $pendingAppointments ?></h3>

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

<h3><?= $approvedAppointments ?></h3>

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

<h3><?= $completedAppointments ?></h3>

</div>

</div>

</div>

</div>

<div class="dashboard-card premium-card mb-4">

<div class="row">

<div class="col-lg-8">

<div class="search-box">

<i class="fas fa-search"></i>

<input

type="text"

class="form-control"

id="appointmentSearch"

placeholder="Search appointment by ID or status...">

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

<div class="dashboard-card premium-card">

<div class="card-header-custom">

<div>

<h4>

<i class="fas fa-list-check text-primary me-2"></i>

Appointment List

</h4>

<span>

Total Appointments :

<strong><?= $totalAppointments ?></strong>

</span>

</div>

</div>

<div class="table-responsive">

    
                  <table class="table premium-table align-middle" id="appointmentTable">

    <thead>

        <tr>

            <th>#</th>

            <th>Appointment</th>

            <th>Status</th>

            <th class="text-center">Actions</th>

        </tr>

    </thead>

    <tbody>

    <?php if(!empty($appointments)): ?>

        <?php foreach($appointments as $appointment): ?>

        <tr>

            <!-- Appointment ID -->

            <td>

                <span class="table-id">

                    #<?= $appointment['id']; ?>

                </span>

            </td>

            <!-- Appointment Info -->

            <td>

                <div class="table-user">

                    <div class="avatar appointment-avatar">

                        <i class="fas fa-calendar-check"></i>

                    </div>

                    <div>

                        <strong>

                            Appointment #<?= $appointment['id']; ?>

                        </strong>

                        <br>

                        <small class="text-muted">

                            Ready for consultation

                        </small>

                    </div>

                </div>

            </td>

            <!-- Status -->

            <td>

                <?php

                $status = strtolower($appointment['status']);

                if($status=="pending"){

                    echo '<span class="status pending"><i class="fas fa-clock"></i> Pending</span>';

                }

                elseif($status=="approved"){

                    echo '<span class="status approved"><i class="fas fa-circle-check"></i> Approved</span>';

                }

                elseif($status=="completed"){

                    echo '<span class="status completed"><i class="fas fa-check-double"></i> Completed</span>';

                }

                elseif($status=="rejected"){

                    echo '<span class="status rejected"><i class="fas fa-circle-xmark"></i> Rejected</span>';

                }

                else{

                    echo '<span class="status unknown">Unknown</span>';

                }

                ?>

            </td>

            <!-- Actions -->

            <td>

                <div class="action-buttons">

                    <a

                    href="index.php?page=create-prescription&appointment_id=<?= $appointment['id']; ?>"

                    class="btn btn-success btn-action"

                    title="Write Prescription">

                        <i class="fas fa-file-prescription"></i>

                    </a>

                </div>

            </td>

        </tr>

        <?php endforeach; ?>

    <?php else: ?>

        <tr>

            <td colspan="4">

                <div class="empty-state">

                    <i class="fas fa-calendar-xmark"></i>

                    <h4>No Appointments Found</h4>

                    <p>

                        You don't have any appointments yet.

                    </p>

                </div>

            </td>

        </tr>

    <?php endif; ?>

    </tbody>

</table>

</div>

<?php include 'view/layouts/footer.php'; ?>