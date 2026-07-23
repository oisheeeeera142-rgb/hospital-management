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

                Doctor Panel / Schedule

            </span>

            <h2 class="page-title">

                <i class="fas fa-calendar-days"></i>

                Manage Schedule

            </h2>

            <p class="page-description">

                Create and manage your available appointment slots.

            </p>

        </div>

        <div>

            <button class="btn btn-primary shadow-sm">

                <i class="fas fa-calendar-plus me-2"></i>

                Schedule Manager

            </button>

        </div>

    </div>

    <?php

    $totalSchedules = count($schedules);

    $availableSchedules = 0;

    $bookedSchedules = 0;

    foreach($schedules as $schedule){

        if($schedule['status']=="available"){

            $availableSchedules++;

        }else{

            $bookedSchedules++;

        }

    }

    ?>

    <!-- =========================
        SUMMARY CARDS
    ========================== -->

    <div class="row g-4 mb-4">

        <div class="col-lg-4 col-md-6">

            <div class="summary-card total-card">

                <div class="summary-icon">

                    <i class="fas fa-calendar-week"></i>

                </div>

                <div>

                    <small>Total Slots</small>

                    <h3><?= $totalSchedules ?></h3>

                </div>

            </div>

        </div>

        <div class="col-lg-4 col-md-6">

            <div class="summary-card approved-card">

                <div class="summary-icon">

                    <i class="fas fa-circle-check"></i>

                </div>

                <div>

                    <small>Available</small>

                    <h3><?= $availableSchedules ?></h3>

                </div>

            </div>

        </div>

        <div class="col-lg-4 col-md-6">

            <div class="summary-card pending-card">

                <div class="summary-icon">

                    <i class="fas fa-calendar-xmark"></i>

                </div>

                <div>

                    <small>Booked</small>

                    <h3><?= $bookedSchedules ?></h3>

                </div>

            </div>

        </div>

    </div>

    <!-- =========================
        ADD SCHEDULE FORM
    ========================== -->

    <div class="dashboard-card premium-card mb-4">

        <div class="card-header-custom">

            <div>

                <h4>

                    <i class="fas fa-calendar-plus text-primary me-2"></i>

                    Add New Schedule

                </h4>

                <span>

                    Create available appointment slots

                </span>

            </div>

        </div>

        <form method="POST">

            <div class="row">

                <div class="col-lg-4 mb-3">

                    <label class="form-label fw-semibold">

                        <i class="fas fa-calendar-day text-primary me-2"></i>

                        Date

                    </label>

                    <input
                        type="date"
                        name="available_date"
                        class="form-control"
                        required>

                </div>

                <div class="col-lg-4 mb-3">

                    <label class="form-label fw-semibold">

                        <i class="fas fa-clock text-success me-2"></i>

                        Start Time

                    </label>

                    <input
                        type="time"
                        name="start_time"
                        class="form-control"
                        required>

                </div>

                <div class="col-lg-4 mb-3">

                    <label class="form-label fw-semibold">

                        <i class="fas fa-hourglass-end text-danger me-2"></i>

                        End Time

                    </label>

                    <input
                        type="time"
                        name="end_time"
                        class="form-control"
                        required>

                </div>

            </div>

            <button
                type="submit"
                class="btn btn-primary px-4">

                <i class="fas fa-save me-2"></i>

                Save Schedule

            </button>

        </form>

    </div>
   
    <div class="dashboard-card">

        <h4 class="mb-4">
            My Schedules
        </h4>

        <div class="table-responsive">

          <table class="table premium-table align-middle" id="scheduleTable">

    <thead>

        <tr>

            <th>#</th>

            <th>Schedule</th>

            <th>Time Slot</th>

            <th>Status</th>

        </tr>

    </thead>

    <tbody>

    <?php if(!empty($schedules)): ?>

        <?php foreach($schedules as $schedule): ?>

        <tr>

            <!-- ID -->

            <td>

                <span class="table-id">

                    #<?= $schedule['id']; ?>

                </span>

            </td>

            <!-- Schedule Date -->

            <td>

                <div class="table-user">

                    <div class="avatar schedule-avatar">

                        <i class="fas fa-calendar-days"></i>

                    </div>

                    <div>

                        <strong>

                            <?= date('d M Y', strtotime($schedule['available_date'])); ?>

                        </strong>

                        <br>

                        <small class="text-muted">

                            Appointment Day

                        </small>

                    </div>

                </div>

            </td>

            <!-- Time -->

            <td>

                <div class="time-slot">

                    <span class="time-pill start">

                        <i class="fas fa-clock me-1"></i>

                        <?= date('h:i A', strtotime($schedule['start_time'])); ?>

                    </span>

                    <span class="time-divider">

                        →

                    </span>

                    <span class="time-pill end">

                        <i class="fas fa-hourglass-end me-1"></i>

                        <?= date('h:i A', strtotime($schedule['end_time'])); ?>

                    </span>

                </div>

            </td>

            <!-- Status -->

            <td>

                <?php if($schedule['status']=="available"): ?>

                    <span class="status approved">

                        <i class="fas fa-circle-check"></i>

                        Available

                    </span>

                <?php else: ?>

                    <span class="status rejected">

                        <i class="fas fa-calendar-xmark"></i>

                        Booked

                    </span>

                <?php endif; ?>

            </td>

        </tr>

        <?php endforeach; ?>

    <?php else: ?>

        <tr>

            <td colspan="4">

                <div class="empty-state">

                    <i class="fas fa-calendar-xmark"></i>

                    <h4>No Schedule Added</h4>

                    <p>

                        You haven't created any appointment schedule yet.

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

const scheduleSearch=document.getElementById("scheduleSearch");

if(scheduleSearch){

scheduleSearch.addEventListener("keyup",function(){

let value=this.value.toLowerCase();

document.querySelectorAll("#scheduleTable tbody tr").forEach(function(row){

row.style.display=row.innerText.toLowerCase().includes(value) ? "" : "none";

});

});

}

</script>

<?php include 'view/layouts/footer.php'; ?>