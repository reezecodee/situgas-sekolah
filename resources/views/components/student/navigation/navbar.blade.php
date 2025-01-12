<div class="sticky-top">
    <header class="navbar navbar-expand-md sticky-top d-print-none">
        <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                <a href="">
                    <img src="{{ asset('images/logo/logo-situgas.png') }}" height="32" width="102" alt="Tabler"
                        class="navbar-brand-image">
                </a>
            </h1>
            <div class="navbar-nav flex-row order-md-last">
                <div class="nav-item d-none d-md-flex me-3">
                    <div class="btn-list">
                        <BtnTransparent />
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                        aria-label="Open user menu">
                        <span class="avatar avatar-sm"
                            style="background-image: url(https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png)"></span>
                        <div class="d-none d-xl-block ps-2">
                            <div>{{ $userActive->nama }}</div>
                            <div class="mt-1 small text-muted">{{ $userActive->nis }}</div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a wire:navigate href="{{ route('student.profile') }}" class="dropdown-item">Profile</a>
                        <form method="POST" action="{{ route('logout') }}" id="logout">
                            @csrf
                            <button type="button" class="dropdown-item" onclick="confirmLogout()">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <header class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="navbar">
                <div class="container-xl">
                    <ul class="navbar-nav">
                        <x-student.link.navitem title="Dashboard" page-target="dashboard"
                            :href="route('student.dashboard')">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                        </x-student.link.navitem>
                        <x-student.link.nav-dropdown title="Akademik" page-target="akademik">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                            </svg>
                            <x-slot name="subitem">
                                <x-student.link.dropdown-item :href="route('student.calendar')"
                                    page-target="akademik/kalender-akademik">Kalender
                                    akademik</x-student.link.dropdown-item>
                                <x-student.link.dropdown-item :href="route('student.schedule')"
                                    page-target="akademik/jadwal-pelajaran">Jadwal
                                    pelajaran</x-student.link.dropdown-item>
                                <x-student.link.dropdown-item :href="route('student.myClass')"
                                    page-target="akademik/kelas-saya">Kelas
                                    saya</x-student.link.dropdown-item>
                            </x-slot>
                        </x-student.link.nav-dropdown>
                        <x-student.link.navitem title="Kegiatan belajar" page-target="kegiatan"
                            :href="route('student.assignment')">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                </svg>
                            </span>
                        </x-student.link.navitem>
                    </ul>
                </div>
            </div>
        </div>
    </header>
</div>