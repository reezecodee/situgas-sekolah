<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="" class="text-nowrap logo-img">
                <img src="{{ asset('images/logo/logo-situgas.png') }}" width="200" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <x-staff.link.sidebar-item icon="ti-layout-dashboard" page-target="dashboard"
                    :href="route('staff.dashboard')">
                    Dashboard
                </x-staff.link.sidebar-item>
                @role('Guru')
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Menu guru</span>
                </li>
                <x-staff.link.sidebar-item icon="ti-door-enter" page-target="guru/masuk-kelas"
                    :href="route('teacher.enterClass')">
                    Masuk kelas
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-upload" page-target="guru/upload-materi"
                    :href="route('teacher.upload')">
                    Upload materi
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-pencil-plus" page-target="guru/penugasan"
                    :href="route('teacher.task')">
                    Penugasan
                </x-staff.link.sidebar-item>
                @endrole
                @role('Admin')
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Menu admin</span>
                </li>
                <x-staff.link.sidebar-item icon="ti-notebook" page-target="admin/tahun-ajaran"
                    :href="route('year.list')">
                    Tahun ajaran
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-building-bank" page-target="admin/kelas"
                    :href="route('class.list')">
                    Manajemen kelas
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-ruler-2" page-target="admin/admin" :href="route('admin.list')">
                    Manajemen admin
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-chalkboard" page-target="admin/guru" :href="route('teacher.list')">
                    Manajemen guru
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-users" page-target="admin/siswa" :href="route('student.list')">
                    Manajemen siswa
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-school" page-target="admin/pelajaran" :href="route('subject.list')">
                    Manajemen pelajaran
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-calendar-event" page-target="admin/jadwal-mengajar"
                    :href="route('schedule.teaching')">
                    Atur jadwal mengajar
                </x-staff.link.sidebar-item>
                @endrole
                <x-staff.link.sidebar-item icon="ti-calendar" page-target="admin/kalender"
                :href="route('calendar.index')">
                Kalender akademik
            </x-staff.link.sidebar-item>
            </ul>
        </nav>
    </div>
</aside>