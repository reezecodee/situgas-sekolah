<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- CSS template files -->
    <link href="/student/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="/student/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="/student/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="/student/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link href="/student/css/demo.min.css?1684106062" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
    {{ $style ?? '' }}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.4.3/echarts.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <script src="/student/js/demo-theme.min.js?1684106062"></script>
    <div class="page">
        <x-student.navigation.navbar />
        <div class="page-wrapper">
            {{ $header ?? '' }}
            <div class="page-body">
                <div class="container-xl">
                    @if (session('success') || session()->has('success'))
                        <x-alert.success/>
                    @elseif(session('failed') || session()->has('failed'))
                        <x-alert.failed/>
                    @endif
                    {{ $slot }}
                </div>
            </div>
            <x-student.navigation.footer />
        </div>
    </div>
    <script data-navigate-once src="/student/js/tabler.min.js?1684106062" defer></script>
    <script src="/student/js/demo.min.js?1684106062" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    {{ $script ?? '' }}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/swal.js"></script>
    @livewireScripts
</body>

</html>
