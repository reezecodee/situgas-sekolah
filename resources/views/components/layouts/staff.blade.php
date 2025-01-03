<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="stylesheet" href="/staff/css/styles.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">

    {{ $style ?? '' }}
</head>

<body class="font-sans antialiased">
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <x-staff.navigation.sidebar />
        <div class="body-wrapper">
            <x-staff.navigation.navbar />
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">{{ $title }}</h5>
                        @if (session('success') || session()->has('success'))
                        <x-alert.success />
                        @elseif(session('failed') || session()->has('failed'))
                        <x-alert.failed />
                        @endif
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/staff/libs/jquery/dist/jquery.min.js"></script>
    <script data-navigate-once src="/staff/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/staff/js/sidebarmenu.js"></script>
    <script src="/staff/js/app.min.js"></script>
    <script src="/staff/libs/simplebar/dist/simplebar.js"></script>
    <script src="/staff/js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/swal.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    {{ $script ?? '' }}
</body>

</html>