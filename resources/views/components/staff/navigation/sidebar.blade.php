<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
                <img src="https://www.cybermakassar.com/asset/foto_berita/siakad-app.png" width="150" alt="" />
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
                <x-staff.link.sidebar-item icon="ti-rubber-stamp" page-target="surat-undangan" :href="route('homeroom.invitattion')">
                    Buat surat undangan
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-mail-forward" page-target="kirim-notifikasi" :href="route('staff.notification')">
                    Kirim notifikasi
                </x-staff.link.sidebar-item>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Menu guru</span>
                </li>
                <x-staff.link.sidebar-item icon="ti-door-enter" page-target="masuk-kelas" href="">
                    Masuk kelas
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-upload" page-target="upload-materi" href="">
                    Upload materi
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-pencil-plus" page-target="buat-tugas" href="">
                    Buat tugas
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-chart-dots" page-target="penilaian-tugas" href="">
                    Penilaian tugas
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-mailbox" page-target="kirim-hasil-studi" href="">
                    Kirim hasil studi
                </x-staff.link.sidebar-item>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Menu admin</span>
                </li>
                <x-staff.link.sidebar-item icon="ti-chart-bubble" page-target="manajemen-program-studi" href="">
                    Manajemen program studi
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-building-bank" page-target="manajemen-guru" href="">
                    Manajemen kelas
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-school" page-target="manajemen-guru" href="">
                    Manajemen guru
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-users" page-target="manajemen-siswa" href="">
                    Manajemen siswa
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-settings" page-target="manajemen-aplikasi" href="">
                    Manajemen aplikasi
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-news" page-target="buat-berita" href="">
                    Buat berita
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-paperclip" page-target="buat-surat" href="">
                    Buat surat
                </x-staff.link.sidebar-item>
                <x-staff.link.sidebar-item icon="ti-mail-forward" page-target="kirim-notifikasi" href="">
                    Kirim notifikasi
                </x-staff.link.sidebar-item>
            </ul>
        </nav>
    </div>
</aside>
