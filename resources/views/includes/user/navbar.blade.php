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
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="nav-link"  style="color: #FFF !important;" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </a>
                </form>
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
