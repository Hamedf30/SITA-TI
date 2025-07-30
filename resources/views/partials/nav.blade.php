<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      @if (Auth::check() && Auth::user()->roles == 'admin')
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
      </li>
      @elseif (Auth::check() && Auth::user()->roles == 'mahasiswa')
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('mahasiswa.dashboard') }}" class="nav-link">Home</a>
      </li>
      @elseif (Auth::check() && Auth::user()->roles == 'dosen')
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dosen.dashboard') }}" class="nav-link">Home</a>
      </li>
      @elseif (Auth::check() && Auth::user()->roles == 'kaprodi')
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('kaprodi.dashboard') }}" class="nav-link">Home</a>
      </li>
      @elseif (Auth::check() && Auth::user()->roles == 'kajur')
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('kajur.dashboard') }}" class="nav-link">Home</a>
      </li>
      @endif
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
      <!-- User Dropdown Menu -->
      <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
              <i class="fas fa-user"></i> {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu dropdown-menu-right">
              <a href="{{ route('profile') }}" class="dropdown-item">
                  <i class="fas fa-user-circle"></i> Profil
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item" 
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              <!-- Form Logout -->
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
      </li>
  </ul>
</nav>
