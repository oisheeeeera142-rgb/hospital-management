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
                Dashboard / Appointments
            </span>

            <h2 class="page-title">
                <i class="fas fa-calendar-check"></i>
                Manage Appointments
            </h2>

            <p class="page-description">
                Monitor, approve and manage all hospital appointments.
            </p>

        </div>

        <div class="page-header-right">

            <button class="btn btn-primary shadow-sm">

                <i class="fas fa-chart-line me-2"></i>

                Analytics

            </button>

        </div>

    </div>



    <!-- ===========================
         SUMMARY CARDS
    ============================ -->

    <?php

    $totalAppointments = count($appointments);

    $pendingCount = 0;
    $approvedCount = 0;
    $completedCount = 0;

    foreach($appointments as $a){

        if($a['status']=='pending') $pendingCount++;

        if($a['status']=='approved') $approvedCount++;

        if($a['status']=='completed') $completedCount++;

    }

    ?>

    <div class="row g-4 mb-4">

        <div class="col-xl-3 col-md-6">

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

        <div class="col-xl-3 col-md-6">

            <div class="summary-card pending-card">

                <div class="summary-icon">

                    <i class="fas fa-clock"></i>

                </div>

                <div>

                    <small>Pending</small>

                    <h3><?= $pendingCount ?></h3>

                </div>

            </div>

        </div>

        <div class="col-xl-3 col-md-6">

            <div class="summary-card approved-card">

                <div class="summary-icon">

                    <i class="fas fa-circle-check"></i>

                </div>

                <div>

                    <small>Approved</small>

                    <h3><?= $approvedCount ?></h3>

                </div>

            </div>

        </div>

        <div class="col-xl-3 col-md-6">

            <div class="summary-card completed-card">

                <div class="summary-icon">

                    <i class="fas fa-file-circle-check"></i>

                </div>

                <div>

                    <small>Completed</small>

                    <h3><?= $completedCount ?></h3>

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
                        id="appointmentSearch"
                        class="form-control"
                        placeholder="Search patient, doctor, date...">

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

                    <i class="fas fa-table text-primary me-2"></i>

                    Appointment Records

                </h4>

                <span>

                    Total Records :
                    <strong><?= $totalAppointments ?></strong>

                </span>

            </div>

        </div>

        <div class="table-responsive">
         
    <table class="table premium-table align-middle" id="appointmentTable">

    <thead>

        <tr>

            <th>#</th>

            <th>
                <i class="fas fa-user-injured me-2"></i>
                Patient
            </th>

            <th>
                <i class="fas fa-user-doctor me-2"></i>
                Doctor
            </th>

            <th>
                <i class="fas fa-calendar me-2"></i>
                Date
            </th>

            <th>
                <i class="fas fa-clock me-2"></i>
                Time
            </th>

            <th>
                Status
            </th>

            <th class="text-center">
                Actions
            </th>

        </tr>

    </thead>

    <tbody>

    <?php if(!empty($appointments)): ?>

    <?php foreach($appointments as $appointment): ?>

    <tr>

        <td>

            <span class="table-id">

                #<?= $appointment['id']; ?>

            </span>

        </td>

        <td>

            <div class="table-user">

                <div class="avatar patient">

                    <i class="fas fa-user"></i>

                </div>

                <div>

                    <strong>

                        <?= $appointment['patient_name']; ?>

                    </strong>

                </div>

            </div>

        </td>

        <td>

            <div class="table-user">

                <div class="avatar doctor">

                    <i class="fas fa-user-doctor"></i>

                </div>

                <div>

                    <strong>

                        <?= $appointment['doctor_name']; ?>

                    </strong>

                </div>

            </div>

        </td>

        <td>

            <span class="date-pill">

                <?= $appointment['appointment_date']; ?>

            </span>

        </td>

        <td>

            <?= $appointment['appointment_time']; ?>

        </td>

        <td>

<?php

$status=$appointment['status'];

if($status=='approved')
{

echo '<span class="status approved"><i class="fas fa-circle-check"></i> Approved</span>';

}
elseif($status=='pending')
{

echo '<span class="status pending"><i class="fas fa-clock"></i> Pending</span>';

}
elseif($status=='completed')
{

echo '<span class="status completed"><i class="fas fa-check-double"></i> Completed</span>';

}
elseif($status=='rejected')
{

echo '<span class="status rejected"><i class="fas fa-circle-xmark"></i> Rejected</span>';

}
else
{

echo '<span class="status unknown">Unknown</span>';

}

?>

        </td>

        <td>

            <div class="action-buttons">

                <a

                    href="index.php?page=approve-appointment-admin&id=<?= $appointment['id']; ?>"

                    class="btn btn-success btn-action">

                    <i class="fas fa-check"></i>

                </a>

                <a

                    href="index.php?page=delete-appointment&id=<?= $appointment['id']; ?>"

                    class="btn btn-danger btn-action"

                    onclick="return confirm('Delete Appointment?')">

                    <i class="fas fa-trash"></i>

                </a>

            </div>

        </td>

    </tr>

    <?php endforeach; ?>

    <?php else: ?>

    <tr>

        <td colspan="7">

            <div class="empty-state">

                <i class="fas fa-calendar-xmark"></i>

                <h5>No Appointments Found</h5>

                <p>

                    There are currently no appointment records.

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

<?php include 'view/layouts/footer.php'; ?>