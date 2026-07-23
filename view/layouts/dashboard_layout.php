<div class="dashboard-layout">

    <!-- Sidebar -->
    <aside class="dashboard-sidebar">
        <?php include 'sidebar.php'; ?>
    </aside>

    <!-- Main Wrapper -->
    <div class="dashboard-main">

        <!-- Top Navigation -->
        <header class="dashboard-header">
            <?php include 'navbar.php'; ?>
        </header>

        <!-- Page Content -->
        <main class="dashboard-content">
            <?= $content ?>
        </main>

    </div>

</div>