<?php include 'view/layouts/header.php'; ?>
<?php include 'view/layouts/sidebar.php'; ?>

<div class="main-content">

    <h2>Appointment History</h2>

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>ID</th>
                <th>Status</th>
                <th>Date</th>

            </tr>

        </thead>

        <tbody>

            <?php foreach($appointments as $appointment): ?>

                <tr>

                    <td><?= $appointment['id']; ?></td>

                    <td><?= $appointment['status']; ?></td>

                    <td><?= $appointment['appointment_date']; ?></td>

                </tr>

            <?php endforeach; ?>

        </tbody>
        <nav>

    <ul class="pagination">

        <?php for($i = 1; $i <= $totalPages; $i++): ?>

            <li class="page-item
                <?= ($page == $i) ? 'active' : ''; ?>">

                <a class="page-link"
                   href="index.php?page=appointment-history&p=<?= $i; ?>">

                    <?= $i; ?>

                </a>

            </li>

        <?php endfor; ?>

    </ul>

</nav>

    </table>

</div>

<?php include 'view/layouts/footer.php'; ?>