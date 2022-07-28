<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-fire"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Notif Api</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <?php
            if($_SESSION['user']['role'] == 1){
            ?>
            <li class="nav-item active">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-user fa-tachometer-alt"></i>
                    <span>Kelola Admin</span></a>
            </li>
            <?php
            }
            ?>
            <?php
            if($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2){
            ?>
            <li class="nav-item active">
                <a class="nav-link" href="user.php">
                    <i class="fas fa-user fa-tachometer-alt"></i>
                    <span>Kelola User</span></a>
            </li>
            <?php
            }
            ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->