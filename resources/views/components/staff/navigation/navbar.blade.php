<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <span style="font-size: 14px;" class="me-2 fw-bold">{{ $userActive->nama }}</span>
                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="" width="35"
                            height="35" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="{{ route('staff.profile') }}"
                                class="d-flex align-items-center gap-2 dropdown-item {{ Request::is('staff/profile-saya*') ? 'active' : '' }}">
                                <i class="ti ti-user fs-6"></i>
                                <p class="mb-0 fs-3">Profile Saya</p>
                            </a>
                            <div class="d-flex justify-content-center w-full">
                                <form method="POST" action="{{ route('logout') }}" id="logout">
                                    @csrf
                                    <button type="button" onclick="confirmLogout()"
                                        class="btn btn-danger">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
