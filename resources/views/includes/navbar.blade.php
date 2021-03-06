<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if (Auth::user()->avatar != NULL)
                    <img src="{{ asset('storage/file-avatar/' . Auth::user()->avatar) }}" alt="" srcset="" class="rounded-circle" width="25">
                    <span class="ml-2 mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                @else
                    <img src="{{ url('images/avatar.png') }}" alt="" srcset="" class="rounded-circle" width="25">
                    <span class="ml-2 mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                @endif
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- End of Topbar -->
