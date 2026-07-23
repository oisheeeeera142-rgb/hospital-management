<?php include 'view/layouts/header.php'; ?>
<?php include 'view/layouts/sidebar.php'; ?>

<div class="main-content">

    <div class="dashboard-card">

        <h3 class="mb-4">
            Prescription History
        </h3>

        <table class="table table-bordered">

            <thead>

                <tr>

                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Medicines</th>
                    <th>Dosage</th>
                    <th>Duration</th>
                    <th>Tests</th>
                    <th>Notes</th>

                </tr>

            </thead>

            <tbody>

                <?php if(!empty($prescriptions)): ?>

                    <?php foreach($prescriptions as $prescription): ?>

                        <tr>

                            <td>
                                <?= $prescription['doctor_name']; ?>
                            </td>

                            <td>
                                <?= $prescription['appointment_date']; ?>
                            </td>

                            <td>
                                <?= $prescription['medicines']; ?>
                            </td>

                            <td>
                                <?= $prescription['dosage']; ?>
                            </td>

                            <td>
                                <?= $prescription['duration']; ?>
                            </td>

                            <td>
                                <?= $prescription['tests']; ?>
                            </td>

                            <td>
                                <?= $prescription['notes']; ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td colspan="7"
                            class="text-center">

                            No Prescriptions Found

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

<?php include 'view/layouts/footer.php'; ?>