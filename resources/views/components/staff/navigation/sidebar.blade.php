<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="" class="text-nowrap logo-img">
                <img src="https://utfs.io/f/1Vi5BNMUOBYhDOSAZe8RbNw0TePuECxWqiodzAnkc2G5lZKH" width="150" alt="" />
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
                <x-staff.link.sidebar-item icon="ti-layout-dashboard" page-target="dashboard" :href="route('staff.dashboard')">
                    Dashboard
                </x-staff.link.sidebar-item>
                @can('Wali Kelas')
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Menu wali kelas</span>
                </li>
                <x-staff.link.sidebar-item icon="ti-users" page-target="wali-kelas/murid-bimbingan" :href="route('homeroom.guidance')">
                    Murid bimbingan
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-report" page-target="rekapitulasi-nilai" :href="route('homeroom.recapitulation')">
                    Rekapitulasi nilai
                </x-staff.link.sidebar-item>
                {{-- <x-staff.link.sidebar-item icon="ti-briefcase" page-target="manajemen-pkl" :href="route('homeroom.internship')">
                    Manajemen PKL
                </x-staff.link.sidebar-item> --}}
                <x-staff.link.sidebar-item icon="ti-rubber-stamp" page-target="surat" :href="route('homeroom.invitation')">
                    Buat surat
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-mail-forward" page-target="kirim-notifikasi" :href="route('staff.notification')">
                    Kirim notifikasi
                </x-staff.link.sidebar-item>
                @endcan
                @role('Guru')
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Menu guru</span>
                </li>
                <x-staff.link.sidebar-item icon="ti-door-enter" page-target="guru/masuk-kelas" :href="route('teacher.enterClass')">
                    Masuk kelas
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-upload" page-target="guru/upload-materi" :href="route('teacher.upload')">
                    Upload materi
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-pencil-plus" page-target="guru/penugasan" :href="route('teacher.task')">
                    Penugasan
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-mailbox" page-target="guru/kirim-hasil-studi" :href="route('teacher.studyResult')">
                    Kirim hasil studi
                </x-staff.link.sidebar-item>
                @endrole
                @role('Admin')
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Menu admin</span>
                </li>
                <x-staff.link.sidebar-item icon="ti-notebook" page-target="admin/tahun-ajaran" :href="route('year.list')">
                    Tahun ajaran
                </x-staff.link.sidebar-item>
                {{-- <x-staff.link.sidebar-item icon="ti-chart-bubble" page-target="admin/prodi" :href="route('major.list')">
                    Manajemen prodi
                </x-staff.link.sidebar-item> --}}
                <x-staff.link.sidebar-item icon="ti-building-bank" page-target="admin/kelas" :href="route('class.list')">
                    Manajemen kelas
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-ruler-2" page-target="admin/admin" :href="route('admin.list')">
                    Manajemen admin
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-chalkboard" page-target="admin/guru" :href="route('teacher.list')">
                    Manajemen guru
                </x-staff.link.sidebar-item>
                {{-- <x-staff.link.sidebar-item icon="ti-users" page-target="admin/siswa" :href="route('student.list')">
                    Manajemen siswa
                </x-staff.link.sidebar-item> --}}
                <x-staff.link.sidebar-item icon="ti-school" page-target="admin/pelajaran" :href="route('subject.list')">
                    Manajemen pelajaran
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-settings" page-target="admin/aplikasi" :href="route('app.setting')">
                    Manajemen aplikasi
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-calendar" page-target="admin/kalender" :href="route('calendar.index')">
                    Kalender akademik
                </x-staff.link.sidebar-item>
                {{-- <x-staff.link.sidebar-item icon="ti-paperclip" page-target="admin/surat" :href="route('letter.index')">
                    Buat surat
                </x-staff.link.sidebar-item> --}}
                <x-staff.link.sidebar-item icon="ti-mail-forward" page-target="kirim-notifikasi" :href="route('staff.notification')">
                    Kirim notifikasi
                </x-staff.link.sidebar-item>
                @endrole
            </ul>
        </nav>
    </div>
</aside>
