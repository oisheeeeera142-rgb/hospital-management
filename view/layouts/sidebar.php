<?php $hms_current_page = isset($_GET['page']) ? $_GET['page'] : ''; ?>

<div class="sidebar premium-sidebar" id="hmsSidebar">

    <div class="sidebar-logo">
        <div class="sidebar-logo-icon">
            <i class="fa-solid fa-heart-pulse"></i>
        </div>
        <h3 class="sidebar-logo-text">Smart Hospital</h3>
    </div>

    <button class="sidebar-toggle-btn" id="hmsSidebarToggle" type="button" aria-label="Collapse sidebar">
        <i class="fa-solid fa-angles-left"></i>
    </button>

    <ul>

        <?php if ($_SESSION['role'] == 'admin'): ?>

            <li class="<?php echo $hms_current_page == 'admin-dashboard' ? 'active' : ''; ?>">
                <a href="index.php?page=admin-dashboard">
                    <i class="fas fa-chart-line"></i>
                    <span class="link-text">Dashboard</span>
                </a>
            </li>

            <li class="<?php echo $hms_current_page == 'manage-doctors' ? 'active' : ''; ?>">
                <a href="index.php?page=manage-doctors">
                    <i class="fas fa-user-doctor"></i>
                    <span class="link-text">Doctors</span>
                </a>
            </li>

            <li class="<?php echo $hms_current_page == 'manage-patients' ? 'active' : ''; ?>">
                <a href="index.php?page=manage-patients">
                    <i class="fas fa-users"></i>
                    <span class="link-text">Patients</span>
                </a>
            </li>

            <li class="<?php echo $hms_current_page == 'manage-appointments' ? 'active' : ''; ?>">
                <a href="index.php?page=manage-appointments">
                    <i class="fas fa-calendar-check"></i>
                    <span class="link-text">Appointments</span>
                </a>
            </li>

        <?php endif; ?>

        <?php if ($_SESSION['role'] == 'doctor'): ?>

            <li class="<?php echo $hms_current_page == 'doctor-dashboard' ? 'active' : ''; ?>">
                <a href="index.php?page=doctor-dashboard">
                    <i class="fas fa-chart-pie"></i>
                    <span class="link-text">Dashboard</span>
                </a>
            </li>

            <li class="<?php echo $hms_current_page == 'doctor-appointments' ? 'active' : ''; ?>">
                <a href="index.php?page=doctor-appointments">
                    <i class="fas fa-calendar"></i>
                    <span class="link-text">Appointments</span>
                </a>
            </li>

            <li class="<?php echo $hms_current_page == 'manage-schedule' ? 'active' : ''; ?>">
                <a href="index.php?page=manage-schedule">
                    <i class="fas fa-clock"></i>
                    <span class="link-text">Schedule</span>
                </a>
            </li>

        <?php endif; ?>

        <?php if ($_SESSION['role'] == 'patient'): ?>

            <li class="<?php echo $hms_current_page == 'patient-dashboard' ? 'active' : ''; ?>">
                <a href="index.php?page=patient-dashboard">
                    <i class="fas fa-chart-bar"></i>
                    <span class="link-text">Dashboard</span>
                </a>
            </li>

            <li class="<?php echo $hms_current_page == 'book-appointment' ? 'active' : ''; ?>">
                <a href="index.php?page=book-appointment">
                    <i class="fas fa-calendar-plus"></i>
                    <span class="link-text">Book Appointment</span>
                </a>
            </li>

            <li class="<?php echo $hms_current_page == 'appointment-history' ? 'active' : ''; ?>">
                <a href="index.php?page=appointment-history">
                    <i class="fas fa-history"></i>
                    <span class="link-text">Appointment History</span>
                </a>
            </li>

        <?php endif; ?>

        <li class="sidebar-divider"></li>

        <li class="<?php echo $hms_current_page == 'logout' ? 'active' : ''; ?>">
            <a href="index.php?page=logout">
                <i class="fas fa-sign-out-alt"></i>
                <span class="link-text">Logout</span>
            </a>
        </li>

    </ul>

</div>

<!-- Scoped Premium Sidebar Styles -->
<style>
    .premium-sidebar {
        --sb-width: 260px;
        --sb-width-collapsed: 84px;
        flex-shrink:0;
        width: var(--sb-width);
        min-height: 100vh;
        background: linear-gradient(180deg, #0a1f44 0%, #071530 100%);
        display: flex;
        flex-direction: column;
        padding: 22px 16px;
        position: sticky;
        top: 0;
        transition: width 0.3s ease;
        font-family: 'Poppins', sans-serif;
        box-shadow: 4px 0 20px rgba(0, 0, 0, 0.12);
        z-index: 1020;
    }

    .premium-sidebar.collapsed {
        width: var(--sb-width-collapsed);
    }

    /* Logo */
    .premium-sidebar .sidebar-logo {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 6px 8px 22px 8px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        margin-bottom: 18px;
        overflow: hidden;
    }

    .premium-sidebar .sidebar-logo-icon {
        width: 42px;
        height: 42px;
        min-width: 42px;
        border-radius: 12px;
        background: linear-gradient(135deg, #0d6efd, #20c997);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1.05rem;
        box-shadow: 0 6px 14px rgba(13, 110, 253, 0.35);
    }

    .premium-sidebar .sidebar-logo-text {
        color: #ffffff;
        font-weight: 700;
        font-size: 1.1rem;
        margin: 0;
        white-space: nowrap;
        transition: opacity 0.2s ease;
    }

    .premium-sidebar.collapsed .sidebar-logo-text {
        opacity: 0;
        width: 0;
    }

    /* Toggle Button */
    .premium-sidebar .sidebar-toggle-btn {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: #ffffff;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 0 16px auto;
        transition: all 0.25s ease;
        font-size: 0.8rem;
    }

    .premium-sidebar .sidebar-toggle-btn:hover {
        background: #0d6efd;
        transform: scale(1.05);
    }

    .premium-sidebar.collapsed .sidebar-toggle-btn i {
        transform: rotate(180deg);
    }

    .premium-sidebar .sidebar-toggle-btn i {
        transition: transform 0.3s ease;
    }

    /* Menu */
    .premium-sidebar ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .premium-sidebar .sidebar-divider {
        height: 1px;
        background: rgba(255, 255, 255, 0.08);
        margin: 12px 4px;
    }

    .premium-sidebar li a {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 12px 14px;
        border-radius: 12px;
        color: rgba(255, 255, 255, 0.72);
        text-decoration: none;
        font-weight: 500;
        font-size: 0.92rem;
        position: relative;
        transition: all 0.25s ease;
        white-space: nowrap;
        overflow: hidden;
    }

    .premium-sidebar li a i {
        width: 20px;
        text-align: center;
        font-size: 1rem;
        color: #6fa8ff;
        transition: transform 0.25s ease, color 0.25s ease;
    }

    .premium-sidebar .link-text {
        transition: opacity 0.2s ease;
    }

    .premium-sidebar.collapsed .link-text {
        opacity: 0;
        width: 0;
        display: none;
    }

    .premium-sidebar.collapsed li a {
        justify-content: center;
        padding: 12px 0;
    }

    /* Hover */
    .premium-sidebar li a:hover {
        background: rgba(13, 110, 253, 0.15);
        color: #ffffff;
        transform: translateX(4px);
    }

    .premium-sidebar.collapsed li a:hover {
        transform: translateX(0) scale(1.06);
    }

    .premium-sidebar li a:hover i {
        color: #ffffff;
        transform: scale(1.1);
    }

    /* Active Indicator */
    .premium-sidebar li.active a {
        background: linear-gradient(135deg, #0d6efd, #084298);
        color: #ffffff;
        box-shadow: 0 6px 16px rgba(13, 110, 253, 0.35);
    }

    .premium-sidebar li.active a i {
        color: #ffffff;
    }

    .premium-sidebar li.active a::before {
        content: '';
        position: absolute;
        left: -16px;
        top: 50%;
        transform: translateY(-50%);
        width: 5px;
        height: 60%;
        background: #20c997;
        border-radius: 0 6px 6px 0;
    }

    .premium-sidebar.collapsed li.active a::before {
        left: -16px;
    }

    /* Logout emphasis */
    .premium-sidebar li a[href*="page=logout"] {
        color: #ff8787;
    }

    .premium-sidebar li a[href*="page=logout"] i {
        color: #ff8787;
    }

    .premium-sidebar li a[href*="page=logout"]:hover {
        background: rgba(255, 87, 87, 0.15);
        color: #ffffff;
    }

    .premium-sidebar li a[href*="page=logout"]:hover i {
        color: #ffffff;
    }

    /* Scrollbar */
    .premium-sidebar::-webkit-scrollbar {
        width: 5px;
    }

    .premium-sidebar::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.15);
        border-radius: 10px;
    }

    /* Responsive */
    @media (max-width: 991.98px) {
        .premium-sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .premium-sidebar.mobile-open {
            transform: translateX(0);
        }

        .premium-sidebar .sidebar-toggle-btn {
            display: none;
        }
    }
</style>

<!-- Scoped Sidebar Behavior (collapse toggle + state persistence) -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var sidebar = document.getElementById('hmsSidebar');
        var toggleBtn = document.getElementById('hmsSidebarToggle');

        if (!sidebar || !toggleBtn) return;

        // Restore collapsed state
        if (localStorage.getItem('hmsSidebarCollapsed') === 'true') {
            sidebar.classList.add('collapsed');
        }

        toggleBtn.addEventListener('click', function () {
            sidebar.classList.toggle('collapsed');
            localStorage.setItem(
                'hmsSidebarCollapsed',
                sidebar.classList.contains('collapsed')
            );
        });
    });
</script>