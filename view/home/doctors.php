<?php include 'view/layouts/header.php'; ?>
<link rel="stylesheet" href="public/css/doctors.css">
<?php include 'view/layouts/navbar.php'; ?>

<?php
/* ============================================================
   EXISTING PHP LOGIC — UNCHANGED
   $doctors is expected to be passed in from the controller.
   ============================================================ */

/* ------------------------------------------------------------
   NEW (ADDITIVE ONLY): derive filter option lists from $doctors
   so the Department dropdown is dynamic. Does not alter $doctors
   or any original logic in any way.
   ------------------------------------------------------------ */
$departments = [];
if (!empty($doctors)) {
    foreach ($doctors as $d) {
        if (!empty($d['specialization'])) {
            $departments[$d['specialization']] = $d['specialization'];
        }
    }
    ksort($departments);
}
?>



<div class="container py-4">

    <!-- ===================== HERO ===================== -->
    <div class="doctor-hero text-center">
        <h1>Our Doctors</h1>
        <p class="mb-0 opacity-75">Meet Our Professional Specialist Doctors</p>
    </div>

    <?php if (!empty($doctors)): ?>

        <!-- ===================== SEARCH & FILTER TOOLBAR ===================== -->
        <div class="filter-toolbar">
            <div class="row g-2 align-items-center">

                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fa fa-search text-muted"></i>
                        </span>
                        <input type="text" id="searchDoctor" class="form-control border-start-0"
                               placeholder="Search by name, degree or specialization...">
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <select id="filterDepartment" class="form-select">
                        <option value="">All Departments</option>
                        <?php foreach ($departments as $dept): ?>
                            <option value="<?= htmlspecialchars($dept); ?>">
                                <?= htmlspecialchars($dept); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-3 col-6">
                    <select id="filterExperience" class="form-select">
                        <option value="">Any Experience</option>
                        <option value="0-5">0 - 5 Years</option>
                        <option value="6-10">6 - 10 Years</option>
                        <option value="11-15">11 - 15 Years</option>
                        <option value="16-100">16+ Years</option>
                    </select>
                </div>

                <div class="col-md-2 col-12">
                    <select id="filterAvailability" class="form-select">
                        <option value="">All Doctors</option>
                        <option value="available">Available Only</option>
                        <option value="unavailable">Unavailable</option>
                    </select>
                </div>

            </div>
        </div>

        <!-- ===================== DOCTOR GRID ===================== -->
        <div class="row" id="doctorGrid">

            <?php foreach ($doctors as $index => $doctor): ?>

                <?php
                    /* ------------------------------------------------------------
                       NEW (ADDITIVE ONLY): safe fallbacks for optional fields.
                       Original keys (full_name, specialization, degree,
                       experience, chamber_address) are used exactly as before.
                       ------------------------------------------------------------ */
                    $img              = !empty($doctor['image']) ? $doctor['image'] : 'public/images/doctor1.jpg';
                    $fee              = $doctor['consultation_fee'] ?? null;
                    $rating           = $doctor['rating'] ?? 4.5;
                    $phone            = $doctor['phone'] ?? null;
                    $isAvailable      = array_key_exists('is_available', $doctor) ? (bool)$doctor['is_available'] : true;
                    $experienceNum    = (int) filter_var($doctor['experience'], FILTER_SANITIZE_NUMBER_INT);
                    $fullStars        = floor($rating);
                    $hasHalfStar      = ($rating - $fullStars) >= 0.5;
                ?>

                <div class="col-lg-4 col-md-6 mb-4 doctor-card-col"
                     data-name="<?= htmlspecialchars(strtolower($doctor['full_name'] ?? '')); ?>"
                     data-degree="<?= htmlspecialchars(strtolower($doctor['degree'] ?? '')); ?>"
                     data-department="<?= htmlspecialchars($doctor['specialization'] ?? ''); ?>"
                     data-experience="<?= $experienceNum; ?>"
                     data-availability="<?= $isAvailable ? 'available' : 'unavailable'; ?>">

                    <div class="doctor-card">

                        <div class="doctor-img-wrap">
                            <span class="badge available-badge <?= $isAvailable ? 'bg-success' : 'bg-secondary'; ?>">
                                <?= $isAvailable ? 'Available Now' : 'Unavailable'; ?>
                            </span>
                            <img src="<?= htmlspecialchars($img); ?>" alt="Doctor Image">
                        </div>

                        <div class="doctor-body text-center">

                            <h5 class="doctor-name">
                                <?= htmlspecialchars($doctor['full_name']); ?>
                            </h5>

                            <div class="doctor-specialization">
                                <?= htmlspecialchars($doctor['specialization']); ?>
                            </div>

                            <p class="doctor-meta">
                                <i class="fa fa-graduation-cap"></i>
                                <strong>Degree:</strong> <?= htmlspecialchars($doctor['degree']); ?>
                            </p>

                            <p class="doctor-meta">
                                <i class="fa fa-briefcase"></i>
                                <strong>Experience:</strong> <?= htmlspecialchars($doctor['experience']); ?>
                            </p>

                            <p class="doctor-meta">
                                <i class="fa fa-map-marker-alt"></i>
                                <strong>Chamber:</strong> <?= htmlspecialchars($doctor['chamber_address']); ?>
                            </p>

                            <div class="d-flex justify-content-center align-items-center gap-3 my-2">
                                <div class="rating-stars">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <?php if ($i <= $fullStars): ?>
                                            <i class="fa fa-star"></i>
                                        <?php elseif ($hasHalfStar && $i == $fullStars + 1): ?>
                                            <i class="fa fa-star-half-alt"></i>
                                        <?php else: ?>
                                            <i class="fa-regular fa-star"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    <span class="text-muted ms-1"><?= number_format($rating, 1); ?></span>
                                </div>

                                <?php if ($fee !== null): ?>
                                    <span class="doctor-fee">
                                        <i class="fa fa-money-bill-wave me-1"></i><?= htmlspecialchars($fee); ?> BDT
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="doctor-actions d-flex flex-column gap-2 mt-3">

                                <!-- LOGIN FIRST (original behavior preserved) -->
                                <a href="index.php?page=login" class="btn btn-primary">
                                    <i class="fa fa-calendar-check me-1"></i> Book Appointment
                                </a>

                                <div class="d-flex gap-2">
                                    <?php if ($phone): ?>
                                        <a href="tel:<?= htmlspecialchars($phone); ?>"
                                           class="btn btn-outline-success btn-sm-half">
                                            <i class="fa fa-phone me-1"></i> Call
                                        </a>
                                    <?php else: ?>
                                        <button type="button" class="btn btn-outline-success btn-sm-half" disabled
                                                title="Phone number not available">
                                            <i class="fa fa-phone me-1"></i> Call
                                        </button>
                                    <?php endif; ?>

                                    <button type="button" class="btn btn-outline-secondary btn-sm-half"
                                            data-bs-toggle="modal" data-bs-target="#doctorModal<?= $index; ?>">
                                        <i class="fa fa-user me-1"></i> Profile
                                    </button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <!-- ===================== VIEW PROFILE MODAL ===================== -->
                <div class="modal fade" id="doctorModal<?= $index; ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><?= htmlspecialchars($doctor['full_name']); ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="<?= htmlspecialchars($img); ?>" class="rounded-circle mb-3"
                                     width="100" height="100" alt="Doctor Image">
                                <p><strong>Specialization:</strong> <?= htmlspecialchars($doctor['specialization']); ?></p>
                                <p><strong>Degree:</strong> <?= htmlspecialchars($doctor['degree']); ?></p>
                                <p><strong>Experience:</strong> <?= htmlspecialchars($doctor['experience']); ?></p>
                                <p><strong>Chamber:</strong> <?= htmlspecialchars($doctor['chamber_address']); ?></p>
                                <?php if ($fee !== null): ?>
                                    <p><strong>Consultation Fee:</strong> <?= htmlspecialchars($fee); ?> BDT</p>
                                <?php endif; ?>
                                <p><strong>Rating:</strong> <?= number_format($rating, 1); ?> / 5</p>
                                <p>
                                    <strong>Status:</strong>
                                    <span class="badge <?= $isAvailable ? 'bg-success' : 'bg-secondary'; ?>">
                                        <?= $isAvailable ? 'Available Now' : 'Unavailable'; ?>
                                    </span>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <a href="index.php?page=login" class="btn btn-primary w-100">
                                    <i class="fa fa-calendar-check me-1"></i> Book Appointment
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>

        <div id="noResultsMsg" class="alert alert-warning text-center">
            No doctors match your search/filter criteria.
        </div>

        <!-- ===================== PAGINATION ===================== -->
        <nav class="mt-4">
            <ul class="pagination justify-content-center" id="doctorPagination"></ul>
        </nav>

    <?php else: ?>

        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning text-center">
                    No Doctors Available
                </div>
            </div>
        </div>

    <?php endif; ?>

</div>

<?php if (!empty($doctors)): ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput   = document.getElementById('searchDoctor');
    const deptFilter     = document.getElementById('filterDepartment');
    const expFilter      = document.getElementById('filterExperience');
    const availFilter    = document.getElementById('filterAvailability');
    const cards          = Array.from(document.querySelectorAll('.doctor-card-col'));
    const noResultsMsg   = document.getElementById('noResultsMsg');
    const paginationEl   = document.getElementById('doctorPagination');
    const PER_PAGE        = 6;
    let currentPage       = 1;

    function getFilteredCards() {
        const searchVal = searchInput.value.trim().toLowerCase();
        const dept      = deptFilter.value;
        const expRange  = expFilter.value;
        const avail     = availFilter.value;

        return cards.filter(card => {
            const name       = card.dataset.name;
            const degree     = card.dataset.degree;
            const department = card.dataset.department;
            const experience = parseInt(card.dataset.experience, 10) || 0;
            const availability = card.dataset.availability;

            let matches = true;

            if (searchVal && !(name.includes(searchVal) || degree.includes(searchVal) || department.toLowerCase().includes(searchVal))) {
                matches = false;
            }

            if (dept && department !== dept) {
                matches = false;
            }

            if (expRange) {
                const [min, max] = expRange.split('-').map(Number);
                if (experience < min || experience > max) matches = false;
            }

            if (avail && availability !== avail) {
                matches = false;
            }

            return matches;
        });
    }

    function renderPagination(totalItems) {
        paginationEl.innerHTML = '';
        const totalPages = Math.ceil(totalItems / PER_PAGE);
        if (totalPages <= 1) return;

        const createPageItem = (label, page, disabled = false, active = false) => {
            const li = document.createElement('li');
            li.className = 'page-item' + (disabled ? ' disabled' : '') + (active ? ' active' : '');
            const a = document.createElement('a');
            a.className = 'page-link';
            a.href = '#';
            a.textContent = label;
            a.addEventListener('click', function (e) {
                e.preventDefault();
                if (!disabled) {
                    currentPage = page;
                    applyFilters();
                }
            });
            li.appendChild(a);
            return li;
        };

        paginationEl.appendChild(createPageItem('Previous', currentPage - 1, currentPage === 1));

        for (let i = 1; i <= totalPages; i++) {
            paginationEl.appendChild(createPageItem(i, i, false, i === currentPage));
        }

        paginationEl.appendChild(createPageItem('Next', currentPage + 1, currentPage === totalPages));
    }

    function applyFilters() {
        const filtered = getFilteredCards();

        // hide all first
        cards.forEach(c => c.style.display = 'none');

        if (filtered.length === 0) {
            noResultsMsg.style.display = 'block';
        } else {
            noResultsMsg.style.display = 'none';
        }

        const totalPages = Math.max(1, Math.ceil(filtered.length / PER_PAGE));
        if (currentPage > totalPages) currentPage = totalPages;

        const start = (currentPage - 1) * PER_PAGE;
        const end   = start + PER_PAGE;

        filtered.slice(start, end).forEach(c => c.style.display = '');

        renderPagination(filtered.length);
    }

    [searchInput, deptFilter, expFilter, availFilter].forEach(el => {
        el.addEventListener('input', function () {
            currentPage = 1;
            applyFilters();
        });
    });

    applyFilters();
});
</script>
<?php endif; ?>

<?php include 'view/layouts/footer.php'; ?>