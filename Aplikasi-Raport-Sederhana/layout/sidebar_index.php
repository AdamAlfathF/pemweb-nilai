<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" >
        <div class="sidebar-brand-icon">
            <i class="fas fa-book-reader"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Raport Mahasiswa</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if($title == 'dashboard') echo "active" ?>">
        <a class="nav-link" href="index2.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Menu Utama</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php if($title == 'siswa') echo 'active' ?>">
        <a class="nav-link" href="siswa/siswa.php">
            <i class="fas fa-fw fa-users"></i>
            <span>Mahasiswa</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php if($title == 'nilai') echo 'active' ?>">
        <a class="nav-link" href="nilai/nilai.php">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>Nilai</span>
        </a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php if($title == 'guru') echo 'active' ?>">
        <a class="nav-link" href="guru/guru.php">
            <i class="fas fa-fw fa-chalkboard-teacher"></i>
            <span>Dosen</span>
        </a>
    </li>

    <li class="nav-item <?php if($title == 'mata-pelajaran') echo 'active' ?>">
        <a class="nav-link" href="mata-pelajaran/mata-pelajaran.php">
            <i class="fas fa-fw fa-chalkboard"></i>
            <span>Mata Kuliah</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Log Out -->
    <li class="nav-item">
        <a class="nav-link" href="logout.php">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Log Out</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
