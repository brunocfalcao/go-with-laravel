<!-- Topbar -->
<div>
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">


            <div class="d-sm-flex align-items-center justify-content-center-mb-4">
                <a href="{{ route('index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    {{ __('Back To Home Page') }}</a>
            </div>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    @if (Auth::user()->profile_image)
                        <img class="img-profile rounded-circle"
                            src="{{ asset('profile_images/' . Auth::user()->profile_image) }}" alt="Profile Image">
                    @else
                        <img class="img-profile rounded-circle" src="{{ asset('images/default_user.png') }}"
                            alt="Default Profile Image">
                    @endif
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                        {{ Auth::user()->name }}
                    </span>
                    <i class="fas fa-chevron-down"></i>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{ route('profileview') }}">
                        <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
</div>
<!-- End of Topbar -->
