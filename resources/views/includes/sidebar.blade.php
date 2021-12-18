<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon">
                    <img src="{{ url('images/logo-unib.png') }}" width="200">
                </div>
                {{--  <div class="sidebar-brand-text mx-3">Sistem Dokumen Mutu</div>  --}}
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MENU
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('data-repository.index') }}">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Dokumen Mutu</span></a>
            </li>

            @if (Auth::user()->role == 'ADMIN')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengaturan"
                    aria-expanded="true" aria-controls="collapsePengaturan">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Pengaturan</span>
                </a>
                <div id="collapsePengaturan" class="collapse" aria-labelledby="headingPengaturan"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <h6 class="collapse-header">Sub Menu Pengaturan:</h6>
                        <a class="collapse-item" href="{{ route('data-admin.index') }}">Admin</a>
                        <a class="collapse-item" href="{{ route('data-user.index') }}">User</a>
                    </div>
                </div>
            </li>
            @endif


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
