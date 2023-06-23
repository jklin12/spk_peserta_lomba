<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
       
      
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" id="nav-home">
        <a class="nav-link" href="{{ route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <li class="nav-item" id="nav-anggota">
        <a class="nav-link" href="{{ route('maskapai.index') }}">
            <i class="fas fa-fw fa-plane"></i>
            <span>Data Maskapai</span></a>
    </li>
    <li class="nav-item" id="nav-kriteria">
        <a class="nav-link" href="{{ route('kriteria.index') }}">
            <i class="fas fa-fw fa-database"></i>
            <span>Kriteria</span></a>
    </li>
    <li class="nav-item" id="nav-alternative">
        <a class="nav-link" href="{{ route('alternative.index') }}">
            <i class="fas fa-fw fa-bars"></i>
            <span>Alternative</span></a>
    </li>
    <!--<li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-comment"></i>
            <span>Normalisasi</span></a>
    </li>-->
    <li class="nav-item" id="nav-perangkingan">
        <a class="nav-link" href="{{ route('perangkingan.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Hasil Perangkingan</span></a>
    </li>




</ul>
<!-- End of Sidebar -->