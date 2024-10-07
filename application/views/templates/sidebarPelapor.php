<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SPKT~</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider mt-2">
    
    <!-- Heading -->
    <div class="sidebar-heading">
    <b>User</b>
    </div>
    
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url(); ?>Pelapor/profile">
            <i class="fas fa-fw fa-home"></i>
            <span><b>My Profile</b></span></a>
    </li>    

    <!-- Divider -->
    <hr class="sidebar-divider mt-2">
    
    <!-- Heading -->
    <div class="sidebar-heading">
    <b>Menu Pelapor</b>
    </div>
    
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url(); ?>Pelapor">
            <i class="fas fa-fw fa-home"></i>
            <span><b>Dasboard</b></span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url(); ?>Pelapor/LP">
            <i class="fas fa-fw fa-marker"></i>
            <span><b>Data LP</b></span></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url(); ?>Pelapor/SKTLK">
            <i class="fas fa-fw fa-marker"></i>
            <span><b>Data SKTLK</b></span></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url(); ?>Pelapor/SIK">
            <i class="fas fa-fw fa-marker"></i>
            <span><b>Data SIK</b></span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-2">

    <!-- Heading -->
    <div class="sidebar-heading">
    <b>Logout</b>
    </div>

    <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
    
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('authPelapor/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->