
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

                Doctor Panel / Prescription

            </span>

            <h2 class="page-title">

                <i class="fas fa-file-prescription"></i>

                Write Prescription

            </h2>

            <p class="page-description">

                Create a prescription for the selected patient appointment.

            </p>

        </div>

        <div>

            <span class="badge bg-primary px-3 py-2">

                Appointment #<?= $appointment['id']; ?>

            </span>

        </div>

    </div>

    <!-- =========================
        PRESCRIPTION FORM
    ========================== -->

    <div class="dashboard-card premium-card">

        <div class="card-header-custom">

            <div>

                <h4>

                    <i class="fas fa-notes-medical text-primary me-2"></i>

                    Prescription Details

                </h4>

                <span>

                    Fill in the patient's prescription information

                </span>

            </div>

        </div>

        <form method="POST">

            <input
                type="hidden"
                name="appointment_id"
                value="<?= $appointment['id']; ?>">

            <div class="row">

                <!-- Medicines -->

                <div class="col-lg-6 mb-4">

                    <label class="form-label fw-semibold">

                        <i class="fas fa-pills text-primary me-2"></i>

                        Medicines

                    </label>

                    <textarea
                        name="medicines"
                        rows="5"
                        class="form-control"
                        placeholder="Enter medicine names..."
                        required></textarea>

                </div>

                <!-- Dosage -->

                <div class="col-lg-6 mb-4">

                    <label class="form-label fw-semibold">

                        <i class="fas fa-syringe text-success me-2"></i>

                        Dosage

                    </label>

                    <textarea
                        name="dosage"
                        rows="5"
                        class="form-control"
                        placeholder="Example: 1 tablet twice daily"
                        required></textarea>

                </div>

            </div>

            <div class="row">

                <!-- Duration -->

                <div class="col-lg-6 mb-4">

                    <label class="form-label fw-semibold">

                        <i class="fas fa-calendar-alt text-warning me-2"></i>

                        Duration

                    </label>

                    <input
                        type="text"
                        name="duration"
                        class="form-control"
                        placeholder="Example: 7 Days">

                </div>

                <!-- Tests -->

                <div class="col-lg-6 mb-4">

                    <label class="form-label fw-semibold">

                        <i class="fas fa-flask text-danger me-2"></i>

                        Recommended Tests

                    </label>

                    <textarea
                        name="tests"
                        rows="2"
                        class="form-control"
                        placeholder="Blood Test, X-Ray, ECG..."></textarea>

                </div>

            </div>

            <div class="mb-4">

                <label class="form-label fw-semibold">

                    <i class="fas fa-comment-medical text-info me-2"></i>

                    Doctor Notes

                </label>

                <textarea
                    name="notes"
                    rows="4"
                    class="form-control"
                    placeholder="Additional advice for the patient..."></textarea>

            </div>

            <button
                type="submit"
                class="btn btn-primary px-4 py-2">

                <i class="fas fa-save me-2"></i>

                Save Prescription

            </button>

        </form>

    </div>

</div>
            <input type="hidden"
                   name="appointment_id"
                   value="<?= $appointment['id']; ?>">

            <div class="mb-3">

                <label>Medicines</label>

                <textarea name="medicines"
                          class="form-control"
                          required></textarea>

            </div>

            <div class="mb-3">

                <label>Dosage</label>

                <textarea name="dosage"
                          class="form-control"
                          required></textarea>

            </div>

            <div class="mb-3">

                <label>Duration</label>

                <input type="text"
                       name="duration"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label>Tests</label>

                <textarea name="tests"
                          class="form-control"></textarea>

            </div>

            <div class="mb-3">

                <label>Notes</label>

                <textarea name="notes"
                          class="form-control"></textarea>

            </div>

            <button class="btn btn-primary">

                Save Prescription

            </button>
            <div class="mt-3 d-flex gap-2">

    <button type="submit" class="btn btn-primary">

        <i class="fas fa-save me-2"></i>

        Save Prescription

    </button>

    <a href="index.php?page=doctor-appointments"

       class="btn btn-outline-secondary">

        <i class="fas fa-arrow-left me-2"></i>

        Back

    </a>

</div>

        </form>

    </div>

</div>

<?php include 'view/layouts/footer.php'; ?>