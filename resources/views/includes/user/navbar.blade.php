<nav class="navbar navbar-expand-lg navbar-dark menu shadow fixed-top">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ url('images/logo-unib.png') }}" alt="logo image" width="200">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            @if (Auth::user())
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" style="color: #FFF !important;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (Auth::user()->avatar != NULL)
                    <img src="{{ asset('storage/file-avatar/' . Auth::user()->avatar) }}" alt="" srcset="" class="rounded-circle" width="25">
                    <span class="ml-2 mr-2 d-none d-lg-inline ">{{ Auth::user()->name }}</span>
                    @else
                    <img src="{{ url('images/avatar.png') }}" alt="" srcset="" class="rounded-circle" width="25">
                    <span class="ml-2 mr-2 d-none d-lg-inline ">{{ Auth::user()->name }}</span>
                    @endif
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" style="color: grey !important" href="{{ route('profile.edit_user') }}">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" style="color: grey !important" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>
                </ul>
            </li>
            @else
            <li class="nav-item"><a class="nav-link"  style="color: #FFF !important;" href="{{ route('login') }}">Login</a></li>
            <li class="nav-item"><a class="nav-link" style="color: #FFF !important;"  href="{{ route('register') }}">Register</a>
            @endif
          </li>
        </ul>
      </div>
    </div>
  </nav>
